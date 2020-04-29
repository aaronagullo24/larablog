<?php

namespace App\Http\Controllers\api;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\api\ApiResponseController;
//

class PostController extends ApiResponseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //echo "Hola mundo api";
        $post = Post::join('post_images', 'post_images.post_id', '=', 'posts.id')
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->select('posts.*', 'categories.title as category', 'post_images.image')
            ->orderBy('posts.created_at', 'desc')
            ->paginate(10);
        return $this->successResponse($post);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $Post)
    {
        $Post->image;
        $Post->images;
        $Post->category;
        return $this->successResponse($Post);
    }

    public function url_clean(String $url_clean)
    {

        $Post = Post::where('url_clean', $url_clean)->firstOrFail();
        $Post->image;
        $Post->category;
        return $this->successResponse($Post);
    }

    public function category(Category $category)
    {
        $post = Post::join('post_images', 'post_images.post_id', '=', 'posts.id')->join('categories', 'categories.id', '=', 'posts.category_id')->select('posts.*', 'categories.title as category', 'post_images.image')->orderBy('posts.created_at', 'desc')->where('categories.id', $category->id)
            ->paginate(10);
        //dd($category->post());
        return $this->successResponse([
            "posts" => $post,
            "category" => $category
        ]);
    }
}
