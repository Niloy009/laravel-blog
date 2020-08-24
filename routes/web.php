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

Route::get('/','PostController@allPosts');


Auth::routes();

Route::get('/home', 'PostController@validPost')->name('home');
Route::get('/add-post', 'PostController@addPost');
Route::post('/add-post', 'PostController@createPost')->name("post.add");
Route::get('/single/{id}','PostController@singlePost');
Route::get('/update-post/{id}','PostController@editPost');
Route::post('/update-post', 'PostController@updatePost')->name("post.update");
Route::get('/delete-post/{id}','PostController@deletePost');\
Route::get('/status/{id}', 'PostController@statusChange')->name('status');



