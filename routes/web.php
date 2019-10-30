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


Route::group([
    'prefix' => 'admin',
    'namespace'=>'Admin'
], function () {
    Route::get('/', 'DashboardController@index')->name('admin.panel');
    Route::resource('/categories' , 'CategoriesController');
    Route::get('/comments', 'CommentsController@index');
    Route::get('/comments/toggle/{id}', 'CommentsController@toggle');
    Route::delete('/comments/{id}/destroy', 'CommentsController@destroy')->name('comments.destroy');
    Route::resource('/posts' , 'PostsController');
    Route::get('/posts/toggle/{id}' , 'PostsController@toggle');
    Route::resource('/subscribers', 'SubscriberController');
    Route::resource('/tags', 'TagsController');
    });