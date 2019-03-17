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
    return view('public.index');
});

Route::get('/custom', function(){
    dd(config('app.developers'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/{anypath}', 'HomeController@index')->where('path', '.*');
Route::get('/post', 'PostController@all_post');

Route::group(
    ['middleware' => ['auth']], 
    function () {
        // Category 
        Route::post('/add-category', 'CategoryController@addCategory');
        Route::get('/all-category', 'CategoryController@allCategory');
        Route::get('/category/{id}', 'CategoryController@deleteCategory');
        Route::get('/edit-category/{id}', 'CategoryController@editCategory');
        Route::post('/update-category/{id}', 'CategoryController@updateCategory');

        // Post
        Route::get('/all-post', 'PostController@allPost');
        Route::post('/savepost', 'PostController@savepost');
        Route::get('/delete-post/{id}', 'PostController@deletePost');
        Route::get('/edit-post/{id}', 'PostController@editPost');
        Route::post('/update-post/{id}', 'PostController@updatePost');

        // FrontEnd
        Route::get('/all-blog-posts', 'BlogController@allBlogPosts');
        Route::get('/single-post/{id}', 'BlogController@singlePost');

    }
);




