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

Route::get('/', 'IndexController@index')->name('index');
Route::get('/articles/{title?}/{article}', 'ArticlesController@show')->name('article');
Route::get('/categories/{categoryName}', 'CategoriesController@show')->name('category');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');













// Route::get('/users', function() {
//     return App\User::with('profile')->get();
// });

// Route::get('/categories', function() {
//     return App\Category::all();
// });

// Route::get('/frontblocks', function() {
//     return App\Frontblock::all();
// });