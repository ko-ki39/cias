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

Route::get('/', 'SanController@welcomePage');
Route::get('/top', 'Controller@top');
//routeで送ってきたいからnameをつける
Route::get('/individual/{id}', 'Controller@individual')->name('individual');//マイページ
Route::get('/article_detail/{id}', 'Controller@article_detail')->name('article_detail'); //記事詳細
Route::get('/fake/{id}', 'Controller@fake')->name('fake'); //偽物ページ後で消す

Auth::routes();
Route::get("/login", "SanController@loginPage");
Route::get("/register", "SanController@registerPage");

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/post', 'PostController@postForm')->name('post');
Route::post('/upload', 'PostController@upload')->name('upload');

