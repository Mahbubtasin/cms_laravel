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

Route::get('/home', 'HomeController@index');
//Route::get('/home', 'AdminUsersController@index')->name('home');

Route::get('/admin', function () {
    return view('admin.index');
});

Route::group(['middleware' => 'admin'], function () {

    Route::resource('admin/users', 'AdminUsersController');

    Route::resource('admin/posts', 'AdminPostsController');

    Route::resource('admin/category', 'AdminCategoryController');

    Route::resource('admin/media', 'AdminMediaController');

    Route::resource('admin/comments', 'PostsCommentController');

    Route::resource('admin/comments/replies', 'CommentRepliesController');

});

Route::get('/post/{id}', ['as' => 'home.post', 'uses' => 'AdminPostsController@post']);

//Route::get('/post/{id}', 'AdminPostsController@post');




