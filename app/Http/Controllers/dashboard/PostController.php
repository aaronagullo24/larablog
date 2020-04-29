<?php

namespace App\Http\Controllers\dashboard;

use App\Tag;
use App\Post;
use App\Category;
use App\PostImage;
use App\Helpers\CustomUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostPost;
use App\Http\Requests\UpdatePostPut;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'rol.admin']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        $personas = [
            ["nombre" => "aaron", "edad" => 50],
            ["nombre" => "diego", "edad" => 10],
            ["nombre" => "manolo", "edad" => 40]
        ];

        $collection1 = collect($personas);
        $collection2=new Collection($personas);
        $collection3= Collection::make($personas);
        dd($collection2->filter(function($value,$key){
            return $value['edad'] > 17;
        })->sum('edad'));
        */
        /*
        $personas = ["usuarios 1", "usuario 2", "usuario 3", "usuario 4", "usuario 4"];

        $collection1 = collect($personas);
        dd((bool) $collection1->intersect(['usuario 4'])->count());
        */

        $posts = Post::orderBy('created_at', 'desc')->paginate(15);
        return view('dashboard.post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //CustomUrl::hola_mundo();
        $tags = Tag::pluck('id', 'title');
        $categories = Category::pluck('id', 'title');
        $post = new Post();
        return view("dashboard.post.create", compact('post', 'categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostPost $request)
    {
        //dd($request->validated());
        //$request->validate([
        //   'title' => 'required|min:5|max:500',
        //'url_clean'=>'required|min:5|max:500',
        //    'content' => 'required|min:5'
        //]);

        if ($request->url_clean == "") {
            $urlClean = CustomUrl::urlTitle(CustomUrl::convertAccentedCharacters($request->title), '-', true);
        } else {
            $urlClean = CustomUrl::urlTitle(CustomUrl::convertAccentedCharacters($request->url_clean), '-', true);
        }
        $requestData = $request->validated();

        $requestData['url_clean'] = $urlClean;

        $validator = Validator::make($requestData, StorePostPost::myRules());

        if ($validator->fails()) {
            return redirect('dashboard/post/create')
                ->withErrors($validator)
                ->withInput();
        }
        //echo "Hola Store: " . $urlClean;

        $post = Post::create($requestData);
        $post->tags()->sync($request->tags_id);
        return back()->with('status', 'Post Creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // $post = Post::findOrFail($id);

        return view('dashboard.post.show', ["post" => $post]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //dd($post->tags);
        $tag = Tag::find(1);
        //dd($tag->posts);
        $tags = Tag::pluck('id', 'title');
        $categories = Category::pluck('id', 'title');

        return view('dashboard.post.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostPut $request, Post $post)
    {
        //echo "hola update";
        //dd($request->tags_id);

        //$post->tags()->attach(1);
        $post->tags()->sync($request->tags_id);
        $post->update($request->validated());
        return back()->with('status', 'Post actualizado con exito');
    }

    public function image(Request $request, Post $post)
    {
        //echo "imagen";
        $request->validate([
            'image' => 'required|mimes:jpeg,bmp,png|max:10240'
        ]);

        $filename = time() . "." . $request->image->extension();
        //echo $filename;
        $request->image->move(public_path('image'), $filename);


        PostImage::create(['image' => $filename, 'post_id' => $post->id]);
        return back()->with('status', 'Imagen subida con exito');
    }

    public function contentImage(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpeg,bmp,png|max:10240'
        ]);
        $filename = time() . "." . $request->image->extension();
        //echo $filename;
        $request->image->move(public_path('images_post'), $filename);

        return response()->json(["default" => URL::to('/') . '/images_post/' . $filename]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //echo "eliminar";

        $post->delete();
        return back()->with('status', 'Post eliminado con exito');
    }
}
