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

use Illuminate\Support\Facades\Route;

Route::get('',      'StaticPagesController@home') ->name('home');
Route::get('help',  'StaticPagesController@help') ->name('help');
Route::get('about', 'StaticPagesController@about')->name('about');

/*
 GET    /users	            UsersController@index	显示所有用户列表的页面
 GET	/users/{user}	    UsersController@show	显示用户个人信息的页面
 GET    /users/create	    UsersController@create  创建用户的页面
 POST   /users	            UsersController@store	创建用户
 GET	/users/{user}/edit  UsersController@edit	编辑用户个人资料的页面
 PATCH  /users/{user}	    UsersController@update  更新用户
 DELETE /users/{user}       UsersController@destroy 删除用户

 Route::get   ('/users',             'UsersController@index')  ->name('users.index');
 Route::get   ('/users/create',      'UsersController@create') ->name('users.create');
 Route::get   ('/users/{user}',      'UsersController@show')   ->name('users.show');
 Route::post  ('/users',             'UsersController@store')  ->name('users.store');
 Route::get   ('/users/{user}/edit', 'UsersController@edit')   ->name('users.edit');
 Route::patch ('/users/{user}',      'UsersController@update') ->name('users.update');
 Route::delete('/users/{user}',      'UsersController@destroy')->name('users.destroy');
*/
Route::resource('users',                 'UsersController');
Route::get     ('users/confirm/{token}',   'UsersController@confirmEmail')->name('confirm_email');
Route::get     ('users/{user}/followings', 'UsersController@followings')  ->name('users.followings');
Route::get     ('users/{user}/followers',  'UsersController@followers')   ->name('users.followers');

/*
 GET	/login	SessionsController@create  显示登录页面
 POST	/login	SessionsController@store   创建新会话（登录）
 DELETE	/logout	SessionsController@destroy 销毁会话（退出登录）
*/
Route::get('login',     'SessionsController@create') ->name('login');
Route::post('login',    'SessionsController@store')  ->name('login');
Route::delete('logout', 'SessionsController@destroy')->name('logout');

/*
 GET  /password/reset Auth\ForgotPasswordController@showLinkRequestForm 显示重置密码的邮箱发送页面
 POST /password/email Auth\ForgotPasswordController@sendResetLinkEmail  邮箱发送重设链接
*/
Route::get('password/reset',  'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail') ->name('password.email');

/*
 GET  /password/reset/{token} Auth\ResetPasswordController@showResetForm 密码更新页面
 POST /password/reset         Auth\ResetPasswordController@reset         执行密码更新操作
*/
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset',        'Auth\ResetPasswordController@reset')        ->name('password.update');

/*
 POST   /statuses StatusesController@store   处理创建微博的请求
 DELETE /statuses StatusesController@destroy 处理删除微博的请求
*/
Route::resource('statuses', 'StatusesController', ['only' => ['store', 'destroy']]);
