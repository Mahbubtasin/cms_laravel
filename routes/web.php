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

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@index');
//Route::get('/home', 'AdminUsersController@index')->name('home');



Route::group(['middleware' => 'admin'], function () {

//    Route::get('/admin', function () {
//        return view('admin.index');
//    });
    Route::get('/admin', 'AdminController@index');

    Route::resource('admin/users', 'AdminUsersController');

    Route::resource('admin/posts', 'AdminPostsController');

    Route::resource('admin/category', 'AdminCategoryController');

    Route::resource('admin/media', 'AdminMediaController');

    Route::delete('delete/media', 'AdminMediaController@deleteMedia');

    Route::resource('admin/comments', 'PostsCommentController');

    Route::resource('admin/comments/replies', 'CommentRepliesController');

});

Route::get('/post/{id}', ['as' => 'home.post', 'uses' => 'AdminPostsController@post']);

//Route::get('/post/{id}', 'AdminPostsController@post');


Route::group(['middleware' => 'auth'], function () {

    Route::post('admin/reply', 'CommentRepliesController@reply');

});
