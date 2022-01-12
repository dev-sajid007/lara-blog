<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PostController@index')->name('post.index');


//Route::get('/demo','Democontroller@index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




//View Single Post
Route::get('post/{slug}','PostController@details')->name('post.details');
//Post by Category
Route::get('category/{slug}','PostController@category')->name('post.category');
//Post by Tag
Route::get('tag/{slug}','PostController@tag')->name('post.tag');
//Search Functionality
Route::get('/search','SearchController@index')->name('search');






Route::group(['middleware' => 'auth'],function(){

    Route::get('favourite/post/{id}','FavouriteController@favourite_post')->name('post.favourite');
    //Comments Store
    Route::post('comment/{post}','CommentController@comments')->name('post.comments');

});





Route::group(['as'=>'admin.','prefix' =>'admin','namespace' => 'Admin','middleware' => ['auth','admin']],function(){

    Route::get('dashboard','DashboardController@index')->name('dashboard');
    //Show Author
    Route::get('/authors','AuthorController@index')->name('author.index');
    Route::get('/authors/{id}','AuthorController@delete')->name('author.delete');

    Route::group(['as'=>'tag.','prefix'=>'tag'],function (){

        Route::get('index','TagController@index')->name('index');
        Route::get('get','TagController@getData')->name('get');
        Route::post('store','TagController@store')->name('store');
        Route::get('edit/{id}','TagController@edit')->name('edit');
        Route::post('update/{id}','TagController@update')->name('update');
        Route::get('delete/{id}','TagController@delete')->name('delete');

    });
    Route::group(['as'=>'category.','prefix'=>'category'],function (){

        Route::get('index','CategoryController@index')->name('index');
        Route::get('get','CategoryController@getData')->name('get');
        Route::post('store','CategoryController@store')->name('store');
        Route::get('edit/{id}','CategoryController@edit')->name('edit');
        Route::post('update/{id}','CategoryController@update')->name('update');
        Route::get('delete/{id}','CategoryController@delete')->name('delete');

    });
    Route::group(['as'=>'post.','prefix'=>'post'],function (){

        Route::get('index','PostController@index')->name('index');
        Route::get('create','PostController@create')->name('create');
        Route::get('get','PostController@getData')->name('get');
        Route::post('store','PostController@store')->name('store');
        Route::get('edit/{id}','PostController@edit')->name('edit');
        Route::get('view/{id}','PostController@view')->name('view');
        Route::post('update/{id}','PostController@update')->name('update');
        Route::get('delete/{id}','PostController@delete')->name('delete');

        //Comment Post
        Route::get('comments','CommentController@index')->name('comments');
        Route::get('comments/delete/{id}','CommentController@delete')->name('comments.delete');

        //Favourite Post
        Route::get('favourite','FavouriteController@index')->name('favourite');

        //Pending Post
        Route::get('pending','PostController@pending')->name('pending');
        Route::get('approved/{id}','PostController@approved')->name('approved');



    });

    Route::group(['as'=>'profile.','prefix'=>'profile'],function (){

        Route::get('index','ProfileController@index')->name('index');
        Route::post('update/{id}','ProfileController@update')->name('update');

    });

});
Route::group(['as'=>'author.','prefix' =>'author','namespace' => 'Author','middleware' => ['auth','author']],function(){

    Route::get('dashboard','DashboardController@index')->name('dashboard');

    Route::group(['as'=>'post.','prefix'=>'post'],function (){

        Route::get('index','PostController@index')->name('index');
        Route::get('create','PostController@create')->name('create');
        Route::get('get','PostController@getData')->name('get');
        Route::post('store','PostController@store')->name('store');
        Route::get('edit/{id}','PostController@edit')->name('edit');
        Route::get('view/{id}','PostController@view')->name('view');
        Route::post('update/{id}','PostController@update')->name('update');
        Route::get('delete/{id}','PostController@delete')->name('delete');

        //Comment Post
        Route::get('comments','CommentController@index')->name('comments');
        Route::get('comments/delete/{id}','CommentController@delete')->name('comments.delete');
    });

});






