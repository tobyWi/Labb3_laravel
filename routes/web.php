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

Route::get('/', 'ProductsController@showAll');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Category Routes
Route::get('/categories', [
    'uses' => 'CategoriesController@showAll',
    'as' => 'category.show'
]);

Route::get('/customers/login', [
    'uses' => 'Auth\CustomerLoginController@showLoginForm',
    'as' => 'customers.login'
]);

Route::post('/customers/login', [
    'uses' => 'Auth\CustomerLoginController@login',
    'as' => 'customers.attempt'
]);

// ADMIN ROUTES
Route::group(['prefix'=>'admin', 'middleware' =>'admin'], function () {

  Route::any('/category/create', [
    'uses' => 'CategoriesController@create',
    'as' => 'category.create'
  ]);

  Route::post('/category/store', [
    'uses' => 'CategoriesController@store',
    'as' => 'category.store'
  ]);

  Route::get('/category/{category}/edit', [
    'uses' => 'CategoriesController@edit',
    'as' => 'category.edit'
  ]);

  Route::post('/category/{id}/update', [
    'uses' => 'CategoriesController@update',
    'as' => 'category.update'
  ]);

  Route::get('/category/{id}/delete', [
    'uses' => 'CategoriesController@delete',
    'as' => 'category.delete'
  ]);

  // User Routes
  Route::get('/users', [
    'uses' => 'UsersController@showAll',
    'as' => 'users.show',
  ]);

  Route::get('/users/create', [
    'uses' => 'UsersController@create',
    'as' => 'users.create'
  ]);

  Route::post('/users/store', [
    'uses' => 'UsersController@store',
    'as' => 'users.store'
  ]);

  Route::get('/user/{user}/edit', [
    'uses' => 'UsersController@edit',
    'as' => 'user.edit'
  ]);

  Route::post('/user/{id}/update', [
    'uses' => 'UsersController@update',
    'as' => 'user.update'
  ]);

  Route::get('/user/{id}/delete', [
    'uses' => 'UsersController@delete',
    'as' => 'user.delete'
  ]);

});

// USER ROUTES
// Route::group(['prefix'=>'user', 'middleware' =>'auth'], function () {
  // Product Routes
  Route::get('/products', [
    'uses' => 'ProductsController@showAll',
    'as' => 'products.show',
  ]);

  Route::get('/products/create', [
    'uses' => 'ProductsController@create',
    'as' => 'products.create'
  ]);

  Route::post('/products/store', [
    'uses' => 'ProductsController@store',
    'as' => 'products.store'
  ]);

  Route::get('/product/{product}/edit', [
    'uses' => 'ProductsController@edit',
    'as' => 'product.edit'
  ]);

  Route::post('/product/{id}/update', [
    'uses' => 'ProductsController@update',
    'as' => 'product.update'
  ]);

  Route::get('/product/{id}/delete', [
    'uses' => 'ProductsController@delete',
    'as' => 'product.delete'
  ]);
// });


// CUSTOMER ROUTES
//
Route::get('/customers', [
  'uses' => 'CustomersController@showAll',
  'as' => 'customers.show',
]);

// Route::get('/customers/', [
  // 'uses' => 'CustomersController@checkout',
  // 'as' => 'customers.checkout',
// ]);
