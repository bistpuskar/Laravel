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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin/','as' =>'admin.','middleware' => 'auth'],function(){

Route::get('dashboard',				['as' => 'dashboard',  'uses' =>'Admin\AdminController@index']);
// Route::get('test',['as' => 'test','uses' =>'Admin\AdminController@test']); 
Route::get('user',					['as' => 'user',     	'uses' =>'Admin\UserController@index']);
Route::get('user/add',				['as' => 'user.add',	'uses' =>'Admin\UserController@add']);
Route::post('user/store',			['as' => 'user.store',	'uses' =>'Admin\UserController@store']);
Route::get('user/edit/{id}',		['as' => 'user.edit',	'uses' =>'Admin\UserController@edit']);
Route::post('user/update/{id}',		['as' => 'user.update',	'uses' =>'Admin\UserController@update']);
Route::get('user/delete/{id}',		['as' => 'user.delete',	'uses' =>'Admin\UserController@delete']);

Route::get('category',					['as' => 'category',     	'uses' =>'Admin\CategoryController@index']);
Route::get('category/add',				['as' => 'category.add',	'uses' =>'Admin\CategoryController@add']);
Route::post('category/store',			['as' => 'category.store',	'uses' =>'Admin\CategoryController@store']);
Route::get('category/edit/{id}',		['as' => 'category.edit',	'uses' =>'Admin\CategoryController@edit']);
Route::post('category/update/{id}',		['as' => 'category.update',	'uses' =>'Admin\CategoryController@update']);
Route::get('category/delete/{id}',		['as' => 'category.delete',	'uses' =>'Admin\CategoryController@delete']);

Route::get('news',					['as' => 'news',     	'uses' =>'Admin\NewsController@index']);
Route::get('news/add',				['as' => 'news.add',	'uses' =>'Admin\NewsController@add']);
Route::post('news/store',			['as' => 'news.store',	'uses' =>'Admin\NewsController@store']);
Route::get('news/edit/{id}',		['as' => 'news.edit',	'uses' =>'Admin\NewsController@edit']);
Route::post('news/update/{id}',		['as' => 'news.update',	'uses' =>'Admin\NewsController@update']);
Route::get('news/delete/{id}',		['as' => 'news.delete',	'uses' =>'Admin\NewsController@delete']);
	
});

 

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
