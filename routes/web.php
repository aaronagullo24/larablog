<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('request', function () {
    //$response = Http::get('https://jsonplaceholder.typicode.com/todos/1');
    /*
    Http::fake(
        [
            'jsonplaceholder.*' => Http::response('Hola respuesta', 200)
        ]
    );
    */

    //Http::fake();

    $response = Http::timeout(3)->delete('https://jsonplaceholder.typicode.com/posts/1', [
        'user_id' => 1,
        'name' => 'Aaron'
    ]);

    /*
    Http::assertSent(function ($request) {
        return $request['name'] !== 'Aaron';
    });
    */
    dd($response->body());
    return "request";
});



Route::get('/test', function () {

    $string = "      hola mundo Aaron";
    //$string=strtolower(trim($string));    
    //$string = Str::of($string)->afterLast("o")->ascii();

    $string = Str::of($string)->trim()->lower()->replace(" ", "-")->ascii();

    return $string;
});
/*
Route::get('/hola/{nombre?}', function ($nombre = "juan") {
    return "hola $nombre conocenos: <a href='".route("nosotros")."'>nosotros</a>" ;
});

Route::get('/sobre-nosotros-en-la-web', function () {
    return "<h1>Toda la informacion sobre nosotros</h1>";
})->name("nosotros");


Route::get('home/{nombre?}/{apellido?}', function($nombre="Defecto",$apellido="Manolo") {

    $posts=["Post1","Post2","POST3"];
    $posts2=null;

    return view("home",['nombre'=>$nombre,'apellido'=>$apellido,'posts'=>$posts,'posts2'=>$posts2]);
})->name("home");
*/


Route::resource('dashboard/post', 'dashboard\PostController');
Route::resource('dashboard/category', 'dashboard\CategoryController');
Route::post('dashboard/post/{post}/image', 'dashboard\PostController@image')->name('post.image');
Route::resource('dashboard/user', 'dashboard\UserController');

Route::get('dashboard/post/image-download/{image}', 'dashboard\PostController@imageDownload')->name('post.image-download');

Route::delete('dashboard/post/image-delete/{image}', 'dashboard\PostController@imageDelete')->name('post.image-delete');

Route::resource('dashboard/contact', 'dashboard\ContactController')->only([
    'index', 'show', 'destroy'
]);

Route::resource('dashboard/post-comment', 'dashboard\PostCommentController')->only([
    'index', 'show', 'destroy'
]);

Route::get('dashboard/post-comment/{post}/post', 'dashboard\PostCommentController@post')->name('post-comment.post');

Route::get('dashboard/post-comment/j-show/{postComment}', 'dashboard\PostCommentController@jshow');

Route::post('dashboard/post-comment/proccess/{postComment}', 'dashboard\PostCommentController@proccess');

Route::post('dashboard/post/content_image', 'dashboard\PostController@contentImage');

Route::get('/', 'web\WebController@index')->name('index');

Route::get('/categories', 'web\WebController@index')->name('index');

Route::get('/detail/{id}', 'web\WebController@detail');

Route::get('/post-category/{id}', 'web\WebController@post_category');

Route::get('dashboard/excel/post-export', 'dashboard\PostController@export')->name('post.export');

Route::get('/contact', 'web\WebController@contact');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/image', 'PaquetesController@image')->name('image');
Route::get('/chart', 'PaquetesController@charts')->name('chart');
Route::get('/qr_generate', 'PaquetesController@qr_generate')->name('qr_generate');
Route::get('dashboard/excel/post-import', 'dashboard\PostController@import');
Route::get('/translate', 'PaquetesController@translate')->name('translate');
Route::get('/strip_create_customer', 'PaquetesController@strip_create_customer')->name('strip_create_customer');
Route::get('/stripe_payment_method_register', 'PaquetesController@stripe_payment_method_register')->name('stripe_payment_method_register');
Route::get('/stripe_payment_method_create', 'PaquetesController@stripe_payment_method_create')->name('stripe_payment_method_create');
Route::get('/stripe_payment_method', 'PaquetesController@stripe_payment_method')->name('stripe_payment_method');
Route::get('/stripe_create_only_pay_form', 'PaquetesController@stripe_create_only_pay_form')->name('stripe_create_only_pay_form');
Route::get('/stripe_create_only_pay', 'PaquetesController@stripe_create_only_pay')->name('stripe_create_only_pay');
Route::get('/stripe_create_suscription', 'PaquetesController@stripe_create_suscription')->name('stripe_create_suscription');
