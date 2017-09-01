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

Route::group([
    'as' => 'dashboard.',
    'prefix' => 'dashboard',
    'middleware' => 'auth',
    'namespace' => 'Dashboard'
], function() {
    Route::get('/', 'IndexController@index')->name('index');

    /**
     * Article routes
     */
    Route::post('/articles/{article}/restore', 'ArticlesController@restore')->name('articles.restore');
    Route::resource('/articles', 'ArticlesController');

    /**
     * Category routes
     */
    Route::resource('/categories', 'CategoriesController');

    /**
     * User routes
     */
    Route::resource('/users', 'CategoriesController');

    /**
     * Frontblock routes
     */
    Route::resource('/frontblocks', 'FrontblocksController');
});