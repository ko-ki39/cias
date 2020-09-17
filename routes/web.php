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

Route::get('/', 'Controller@top');
Route::get('/individual', 'Controller@individual');//マイページ
Route::get('/article_detail', 'Controller@article_detail'); //記事詳細
Route::get('/fake', 'Controller@fake'); //偽物ページ後で消す

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
