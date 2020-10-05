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
Auth::routes();

Route::group(['middleware' => ['auth', 'can:user_higher']], function () { // 全ユーザー

});

Route::group(['middleware' => ['auth', 'can:authorized-higher']], function () { //許可されたものと管理者のみ
    // ↓記事作成用のルート

    Route::get('/top/post', 'ArticleController@postForm')->name('post');
    Route::post('/top/upload', 'ArticleController@upload')->name('upload');
    Route::get('/top/upload', 'ArticleController@upload')->name('upload'); //リダイレクトさせるためにget通信も許可させる

    //↓記事の編集用ルート
    Route::get('/top/edit/{id}', 'ArticleController@edit')->name('edit');
    Route::post('/top/update/{id}', 'ArticleController@update')->name('update');
    Route::get('/top/update/{id}', 'ArticleController@update')->name('update');

    // ↓記事削除用ルート
    Route::get('/top/delete/{id}', 'ArticleController@delete')->name('delete');
});

Route::group(['middleware' => ['auth', 'can:admin-only']], function () { // 管理者のみ
    Route::get('/admin', 'AdminController@index')->name('admin'); //ページ閲覧

    // ユーザーの権限変更
    Route::get('/admin/admin_change/{id}', 'AdminController@adminChange')->name('admin_change');


    //記事やユーザーの削除
    Route::get('/admin/user_delete/{id}', 'AdminController@userDelete')->name('user_delete');
    Route::get('/admin/article_delete/{id}', 'AdminController@articleDelete')->name('article_delete');
    Route::get('/admin/comment_delete/{id}', 'AdminController@commentDelete')->name('comment_delete');

});
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'SanController@welcomePage');
Route::get('/top', 'Controller@top')->name('top');

//routeで送ってきたいからnameをつける
Route::get('/top/individual/{id}', 'Controller@individual')->name('individual'); //マイページ
Route::get('/top/article_detail/{id}', 'Controller@article_detail')->name('article_detail'); //記事詳細

//パスワードを忘れた場合の秘密の質問ページ
Route::get('/secret_question', 'Auth\ForgotPasswordController@secretQuestion')->name('secret_question');
Route::post('/secret_question', 'Auth\ForgotPasswordController@secretQuestion')->name('secret_question'); //リダイレクトさせるためにpost通信も許可させる
Route::post('/secret_question_answer', 'Auth\ForgotPasswordController@secretQuestionAnswer')->name('secret_question_answer');
Route::get('/secret_question_answer', 'Auth\ForgotPasswordController@secretQuestionAnswer')->name('secret_question_answer'); //リダイレクトさせるためにget通信も許可させる

//パスワード変更用のルート
Route::post('/change_password', 'Auth\ForgotPasswordController@changePassword')->name('change_password');
Route::get('/change_password', 'Auth\ForgotPasswordController@changePassword')->name('change_password'); //リダイレクトさせるためにget通信も許可させる
