<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::resource('post', 'api\PostController')->only([
    'index', 'show'
]);

Route::get('post/{category}/category','api\PostController@category');
Route::get('category','api\CategoryController@index');
Route::get('category/all','api\CategoryController@all');
