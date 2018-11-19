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
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/orders','HomeController@getOrders')->name('orders');
//Cart
Route::get('/products', 'ProductController@index')->name('products.index');
Route::get('/add-to-cart/{id}', 'ProductController@getAddToCart')->name('products.addToCart');
Route::get('/shopping-cart', 'ProductController@getCart')->name('products.shoppingCart')->middleware('auth');
Route::get('/add-to-cart/{id}', 'ProductController@getAddToCart')->name('products.addToCart');
Route::get('/reduce/{id}', 'ProductController@reduceByOne')->name('products.reduceByOne');
Route::get('/remove/{id}', 'ProductController@removeItem')->name('products.removeItem');
Route::post('/checkout', 'ProductController@storeCheckout')->name('checkout');
//Product
Route::get('/products/{id}', 'ProductController@getArticle')->name('products.getArticle');
Route::resource('products', 'ProductController');
Route::get('/products/category/{id}', 'ProductController@getCategory')->name('products.getCategory');
Route::resource('products', 'ProductController');
//Category
Route::get('/categories', 'CategoryController@index')->name('Categories');
Route::get('/categories/{id}', 'CategoryController@getCategory')->name('categories.getCategory');
Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/products/{id}', 'ProductController@getArticle')->name('Product');
Route::get('/categories', 'CategoryController@index')->name('Categories');

