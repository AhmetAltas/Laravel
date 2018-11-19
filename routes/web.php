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
Route::get('/home', 'HomeController@index')->name('home');
//Product
Route::get('/products', 'ProductController@index')->name('products.index');
Route::get('/shopping-cart', 'ProductController@getCart')->name('products.shoppingCart');
Route::get('/reduce/{id}', 'ProductController@reduceByOne')->name('products.reduceByOne');
Route::get('/remove/{id}', 'ProductController@removeItem')->name('products.removeItem');
Auth::routes();

Route::get('/products/{id}', 'ProductController@getArticle')->name('products.getArticle');
Route::resource('products', 'ProductController');
Route::get('/product/category/{id}', 'ProductController@getCategory')->name('products.getCategory');
Route::get('/add-to-cart/{id}', 'ProductController@getAddToCart')->name('products.addToCart');
//Category
Route::get('/categories', 'CategoryController@index')->name('Categories');
Route::get('/categories/{id}', 'CategoryController@getCategory')->name('categories.getCategory');