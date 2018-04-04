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

Route::get('/', 'FrontendController@index')->name('index');

Route::get('/post/{slug}', 'FrontendController@single')->name('post.single');

Route::get('/category/{id}', 'FrontendController@category')->name('category.single');

Route::get('/tag/{id}', 'FrontendController@tag')->name('tag.single');

Route::get('/results', function() {
    $posts = \App\Post::where('title', 'like', '%' . request('query') . '%')->get();
    
    return view('results', [
        'posts' => $posts,
        'title' => 'Search result : ' . request('query'),
        'setting' => \App\Setting::first(),
        'categories' => \App\Category::all()->take(5)
    ]);
});


Route::post('/subscribe', function() {
    $email = request('email');
    
    
    Newsletter::subscribe($email);    

    Session::flash('subscribed', 'Successfully subscribed');
    return redirect()->back();
});


Auth::routes();


Route::resource('posts', 'PostsController');

Route::resource('categories', 'CategoryController');

Route::resource('tags', 'TagsController');

Route::resource('users', 'UsersController');

Route::resource('profiles', 'ProfileController');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('/dashboard', 'HomeController@index')->name('admin.dashboard');

    Route::get('/posts/trashed', 'PostsController@trashed')->name('posts.trashed');
    Route::get('/posts/kill/{id}', 'PostsController@kill')->name('posts.kill');
    Route::get('/posts/restore/{id}', 'PostsController@restore')->name('posts.restore');

    Route::get('/users/admin/{id}', 'UsersController@admin')->name('users.admin')->middleware('admin');
    Route::get('/users/not-admin/{id}', 'UsersController@not_admin')->name('users.not.admin');

    Route::get('/settings', 'SettingController@index')->name('settings.index');
    Route::post('/settings/update', 'SettingController@update')->name('settings.update');
});


Route::get('/{page}', function() {
    return redirect()->route('index');
});