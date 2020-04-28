<?php

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




/*
Route::get('/test', function () {
    return "hola mundo";
});

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
Route::post('dashboard/post/{post}/image','dashboard\PostController@image')->name('post.image');
Route::resource('dashboard/user', 'dashboard\UserController');

Route::resource('dashboard/contact', 'dashboard\ContactController')->only([
    'index','show','destroy'
]);

Route::post('dashboard/post/content_image','dashboard\PostController@contentImage');

Route::get('/','web\WebController@index' )->name('index');

Route::get('/categories','web\WebController@index' )->name('index');

Route::get('/detail/{id}','web\WebController@detail');

Route::get('/post-category/{id}','web\WebController@post_category');


Route::get('/contact','web\WebController@contact');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
