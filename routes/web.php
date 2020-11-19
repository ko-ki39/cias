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

Route::group(['middleware' => ['auth', 'can:user-higher']], function () { // 全ユーザー

    Route::get('/top/individual/fav_page', 'ArticleController@favArticle')->name('fav_page');
    // Route::get('/top/individual/comment_page', 'ArticleController@commentArticle');
    // Route::get('/top/password_edit', 'Controller@password_edit')->name('password_edit'); //パスワード編集画面

    // Route::get('/top/login_password_change', 'Controller@login_password_change')->name('login_password_change'); //パスワード変更処理
    // Route::post('/top/login_password_change', 'Controller@login_password_change')->name('login_password_change'); //パスワード変更処理


    Route::get('/top/user_edit', 'Controller@user_edit')->name('user_edit'); //ユーザー情報編集画面
    Route::post('/top/user_update', 'Controller@user_update')->name('user_update'); //ユーザー情報変更処理
    Route::get('/top/user_update', 'Controller@user_update')->name('user_update'); //ユーザー情報変更処理

    Route::post("/top/article_detail/post_comment", "ArticleController@commnetAdd"); //コメントを投稿する

    Route::get("/top/individual/article_individual", function(){
      return view('article_individual');
    }); //個人ページのfavしたものなどの表示
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

    //individualページでコメント、お気に入り一覧を表示するやつ
    Route::get('/top/individual/cfAjax', 'IndividualController@commentFavAjax');
});

Route::group(['middleware' => ['auth', 'can:admin-only']], function () { // 管理者のみ
    Route::get('/admin/generate_page', 'AdminController@generate_page')->name('generate_page'); //ユーザー生成ページ
    Route::get('/admin/generate_page/generate', 'AdminController@generate')->name('generate');  //ユーザー生成

    Route::get('/admin/download/{file}', 'AdminController@download')->name('download'); //ユーザー情報が入ったファイルのダウンロード
    Route::get('/admin', 'AdminController@index')->name('admin'); //ページ閲覧

    // ユーザーの権限変更
    Route::get('/admin/admin_change/{id}', 'AdminController@adminChange')->name('admin_change');

    Route::get('/admin/auto_admin_change/', 'AdminController@autoAdminChange')->name('auto_admin_change');

    //情報表示ページ
    Route::get('/admin/admin_user/', 'AdminController@adminUser')->name('admin_user');
    Route::get('/admin/admin_article/', 'AdminController@adminArticle')->name('admin_article');
    Route::get('/admin/admin_comment/', 'AdminController@adminComment')->name('admin_comment');

    //記事やユーザーの削除
    Route::get('/admin/user_delete/{id}', 'AdminController@userDelete')->name('user_delete');
    Route::get('/admin/article_delete/{id}', 'AdminController@articleDelete')->name('article_delete');
    Route::get('/admin/comment_delete/{id}', 'AdminController@commentDelete')->name('comment_delete');

    //admin内での検索機能
    Route::get('/admin/admin_user/search', 'AdminController@userSearch')->name('admin_user_search');
    Route::get('/admin/admin_article/search', 'AdminController@articleSearch')->name('admin_article_search');
    Route::get('/admin/admin_comment/search', 'AdminController@commentSearch')->name('admin_comment_search');
});
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'SanController@welcomePage');
Route::get('/top', 'Controller@top')->name('top');


 //マイページ
Route::get('/top/individual/{id}', 'Controller@individual')->name('individual'); //マイページ



//routeで送ってきたいからnameをつける
Route::get('/top/article_detail/{id}', 'Controller@article_detail')->name('article_detail'); //記事詳細
Route::get('/top/article_detail/{id?}', 'ArticleController@articleDetailForcus')->name("articleDetailForcus"); //コメントにフォーカス

// //パスワードを忘れた場合の秘密の質問ページ
// Route::get('/secret_question', 'Auth\ForgotPasswordController@secretQuestion')->name('secret_question');
// Route::post('/secret_question', 'Auth\ForgotPasswordController@secretQuestion')->name('secret_question'); //リダイレクトさせるためにpost通信も許可させる
// Route::post('/secret_question_answer', 'Auth\ForgotPasswordController@secretQuestionAnswer')->name('secret_question_answer');
// Route::get('/secret_question_answer', 'Auth\ForgotPasswordController@secretQuestionAnswer')->name('secret_question_answer'); //リダイレクトさせるためにget通信も許可させる

//パスワード変更用のルート
// Route::post('/change_password', 'Auth\ForgotPasswordController@changePassword')->name('change_password');

// Route::get('/change_password', 'Auth\ForgotPasswordController@changePassword')->name('change_password'); //リダイレクトさせるためにget通信も許可させる
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// お気に入り
Route::post("/top/fav/{id}", "ArticleController@favOperation");

//検索機能↓
Route::get("/top/search", "Controller@search")->name('search');
Route::get('/top/hashtag', 'Controller@hashtag'); //ajaxを使ったhashの処理
Route::get('/top/hashtag/{hash}', 'Controller@hashtagResult'); //hashtagの検索結果

// Route::get("/top", "ArticleController@top");
