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

Route::group(config('routes.dashboard'), function() {
    Route::get('/', 'IndexController@index')->name('index');

    /**
     * Article routes
     */
    Route::post('/articles/{article}/restore', 'ArticlesController@restore')->name('articles.restore');
    Route::delete('/articles/{article}/delete', 'ArticlesController@delete')->name('articles.delete');
    Route::resource('/articles', 'ArticlesController');

    /**
     * Category routes
     */
    Route::post('/categories/{category}/restore', 'CategoriesController@restore')->name('categories.restore');
    Route::delete('/categories/{category}/delete', 'CategoriesController@delete')->name('categories.delete');
    Route::resource('/categories', 'CategoriesController');

    /**
     * User routes
     */
    Route::resource('/users', 'UsersController');

    /**
     * Frontblock routes
     */
    Route::resource('/frontblocks', 'FrontblocksController');

    /**
     * Editor routes
     */
    Route::post('/editors', 'EditorsController@store')->name('editors.store');
    Route::delete('/editors/{editor}/destroy', 'EditorsController@destroy')->name('editors.destroy');
});