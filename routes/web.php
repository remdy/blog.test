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


Route::group(['middleware' => 'auth'], function (){
    Route::get('/profile', 'ProfileController@index')->middleware('verified');
    Route::post('/profile', 'ProfileController@store');
    Route::get('/logout', 'AuthController@logout');
    Route::post('/comment', 'CommentsController@store');
});

Route::group(['middleware' => 'guest'], function(){
Route::get('/register', 'AuthController@registerForm');
Route::post('/register', 'AuthController@register');
Route::get('/login', 'AuthController@loginForm')->name('login');
Route::post('/login', 'AuthController@login');
});

Route::get('/', 'PaginateController@index');
Route::get('/post/{slug}', 'PaginateController@show')->name('post.show');
Route::get('/tag/{slug}', 'PaginateController@tag')->name('tag.show');
Route::get('/category/{slug}', 'PaginateController@category')->name('category.show');
Route::post('/subscribe', 'SubsController@subscribe');
Route::get('/verify/{token}', 'SubsController@verify');
Route::get('/product', 'ProductsController@index');
Route::get('/product/{slug}', 'ProductsController@show')->name('product.show');
Route::get('/about', 'PaginateController@about');
Route::get('/cards/{slug}', 'CardsController@show')->name('card.show');

Route::group([
    'prefix' => 'admin',
    'namespace'=>'Admin',
    'middleware' => 'admin'
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
    Route::resource('/users', 'UsersController');
    Route::get('/users/toggle/{id}' , 'UsersController@toggle');
    Route::resource('/products', 'ProductsController');
    Route::get('/products/toggle/{id}' , 'ProductsController@toggle');
    Route::resource('/sliders', 'SlidersController');
    Route::resource('/about', 'AboutsController');
    Route::resource('/cards', 'CardsController');
    });


Route::group([
    'prefix' => 'user',
    'namespace' => 'User',
    'middleware' => 'auth'
], function (){
        Route::resource('/forms','FormsController')->middleware('verified');
});


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
