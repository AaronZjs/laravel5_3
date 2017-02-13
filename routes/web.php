<?php

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

Route::get('/', 'Home\HomeController@index');
Route::get('article/{id}', 'Home\HomeController@article');
Route::get('cate/{id}', 'Home\HomeController@cate');

Route::get('login',function(){return view('auth.login');});
Route::post('login','Home\LoginController@login');


// 测试使用，注册用户.
Route::get('register',function(){return view('auth.register');});
Route::post('register','Home\LoginController@register');

// admin
Route::group(['prefix' => 'admin','namespace' => 'Admin','middleware' => ['auth','AdminAuth']],function(){

	Route::get('/','AdminController@index');

	Route::get('cates','CateController@list');
		Route::get('cate/edit/{id}','CateController@edit');
		Route::post('cate/edit','CateController@post_edit');

	Route::get('articles','ArticleController@list');
		Route::post('article/del','ArticleController@del');
		Route::get('article/edit/{id}','ArticleController@edit');
		Route::post('article/edit','ArticleController@post_edit');

	Route::get('logout','AdminController@logout');

});