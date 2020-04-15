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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return "hola mundo";
});

Route::get('/hola/{nombre?}', function ($nombre = "juan") {
    return "hola $nombre conocenos: <a href='".route("nosotros")."'>nosotros</a>" ;
});

Route::get('/sobre-nosotros-en-la-web', function () {
    return "<h1>Toda la informacion sobre nosotros</h1>";
})->name("nosotros");


Route::get('home', function() {
    $nombre="Aaron";
    return view("home");
})->name("home");


