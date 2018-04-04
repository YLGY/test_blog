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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts', 'PostsController');

Route::resource('categories', 'CategoryController');

Route::resource('tags', 'TagsController');

Route::resource('users', 'UsersController');

Route::resource('profiles', 'ProfileController');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('/posts/trashed', 'PostsController@trashed')->name('posts.trashed');
    Route::get('/posts/kill/{id}', 'PostsController@kill')->name('posts.kill');
    Route::get('/posts/restore/{id}', 'PostsController@restore')->name('posts.restore');

    Route::get('/users/admin/{id}', 'UsersController@admin')->name('users.admin')->middleware('admin');
    Route::get('/users/not-admin/{id}', 'UsersController@not_admin')->name('users.not.admin');

    Route::get('/settings', 'SettingController@index')->name('settings.index');
    Route::post('/settings/update', 'SettingController@update')->name('settings.update');
});
