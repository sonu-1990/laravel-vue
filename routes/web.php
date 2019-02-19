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

Route::get('/custom', function(){
    dd(config('app.developers'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/{anypath}', 'HomeController@index')->where('path', '.*');
Route::get('/post', 'PostController@all_post');

// Category 
Route::post('/add-category', 'CategoryController@addCategory');
Route::get('/all-category', 'CategoryController@allCategory');
Route::get('/category/{id}', 'CategoryController@deleteCategory');
Route::get('/edit-category/{id}', 'CategoryController@editCategory');


