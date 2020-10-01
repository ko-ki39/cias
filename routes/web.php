<?php

use Illuminate\Support\Facades\Auth;
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
// Route::get('/test', 'Controller@test');

Route::get('/', 'SanController@welcomePage');
Route::get('/top', 'Controller@top')->name('top');
//routeで送ってきたいからnameをつける
Route::get('/top/individual/{id}', 'Controller@individual')->name('individual');//マイページ
Route::get('/top/article_detail/{id}', 'Controller@article_detail')->name('article_detail'); //記事詳細
// Route::get('/top/fake/{id}', 'Controller@fake')->name('fake'); //偽物ページ後で消す

// Route::get("/login", "SanController@loginPage");
// Route::get("/register", "SanController@registerPage");

// ↓記事作成用のルート
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/top/post', 'ArticleController@postForm')->name('post');
Route::post('/top/upload', 'ArticleController@upload')->name('upload');
Route::get('/top/upload', 'ArticleController@upload')->name('upload'); //リダイレクトさせるためにget通信も許可させる

//↓記事の編集用ルート
Route::get('/top/edit/{id}', 'ArticleController@edit')->name('edit');
Route::post('/top/update/{id}', 'ArticleController@update')->name('update');
Route::get('/top/update/{id}', 'ArticleController@update')->name('update');

// ↓記事削除用ルート
Route::get('/top/delete/{id}', 'ArticleController@delete')->name('delete');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//パスワードを忘れた場合の秘密の質問ページ
Route::get('/secret_question', 'Auth\ForgotPasswordController@secretQuestion')->name('secret_question');
Route::post('/secret_question_answer', 'Auth\ForgotPasswordController@secretQuestionAnswer')->name('secret_question_answer');
// Route::get('/secret_question', function(){
//     // dd();
//     return view('auth/passwords/secret_question');
// })->name('secret_question');




// ↓記事削除用ルート
Route::get('/top/delete/{id}', 'ArticleController@delete')->name('delete');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');