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

Route::get('', 'StaticPagesController@home')->name('home');
Route::get('help', 'StaticPagesController@help')->name('help');
Route::get('about', 'StaticPagesController@about')->name('about');

/*
请求    URL	                动作	                    作用
GET	   /users	            UsersController@index	显示所有用户列表的页面
GET	   /users/{user}	    UsersController@show	显示用户个人信息的页面
GET	   /users/create	    UsersController@create	创建用户的页面
POST   /users	            UsersController@store	创建用户
GET	   /users/{user}/edit	UsersController@edit	编辑用户个人资料的页面
PATCH  /users/{user}	    UsersController@update	更新用户
DELETE /users/{user}	    UsersController@destroy	删除用户
*/

//Route::get('/users', 'UsersController@index')->name('users.index');
//Route::get('/users/create', 'UsersController@create')->name('users.create');
//Route::get('/users/{user}', 'UsersController@show')->name('users.show');
//Route::post('/users', 'UsersController@store')->name('users.store');
//Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');
//Route::patch('/users/{user}', 'UsersController@update')->name('users.update');
//Route::delete('/users/{user}', 'UsersController@destroy')->name('users.destroy');

Route::resource('users', 'UsersController');
