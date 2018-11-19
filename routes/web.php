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
<<<<<<< HEAD
Route::get('/home', 'HomeController@index')->name('home');
//Product
Route::get('/products', 'ProductController@index')->name('products.index');
=======

Route::get('/products', 'ProductController@index')->name('products.index');
Route::get('/add-to-cart/{id}', 'ProductController@getAddToCart')->name('products.addToCart');
>>>>>>> b40858d557168055ba36172ea2c46672f750dc63
Route::get('/shopping-cart', 'ProductController@getCart')->name('products.shoppingCart');
Route::get('/reduce/{id}', 'ProductController@reduceByOne')->name('products.reduceByOne');
Route::get('/remove/{id}', 'ProductController@removeItem')->name('products.removeItem');
Auth::routes();

<<<<<<< HEAD
Route::get('/products/{id}', 'ProductController@getArticle')->name('products.getArticle');
Route::resource('products', 'ProductController');
Route::get('/product/category/{id}', 'ProductController@getCategory')->name('products.getCategory');
Route::get('/add-to-cart/{id}', 'ProductController@getAddToCart')->name('products.addToCart');
//Category
Route::get('/categories', 'CategoryController@index')->name('Categories');
Route::get('/categories/{id}', 'CategoryController@getCategory')->name('categories.getCategory');
=======
Route::get('/home', 'HomeController@index')->name('home');



Route::get('/products/{id}', 'ProductController@getArticle')->name('Product');

Route::resource('products', 'ProductController');

Route::get('/categories', 'CategoryController@index')->name('Categories');
>>>>>>> b40858d557168055ba36172ea2c46672f750dc63
