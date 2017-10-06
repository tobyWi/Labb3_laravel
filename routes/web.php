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


// ADMIN ROUTES
Route::group(['prefix'=>'admin', 'middleware' =>'admin'], function () {
  // Category Routes
  Route::get('/categories', [
    'uses' => 'CategoriesController@showAll',
    'as' => 'category.show'
  ]);

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

  // Route::post('/users/store', [
  //   'uses' => 'UsersController@store',
  //   'as' => 'users.store'
  // ]);
  //
  // Route::get('/user/{user}/edit', [
  //   'uses' => 'UsersController@edit',
  //   'as' => 'user.edit'
  // ]);
  //
  // Route::post('/user/{id}/update', [
  //   'uses' => 'UsersController@update',
  //   'as' => 'user.update'
  // ]);
  //
  // Route::get('/user/{id}/delete', [
  //   'uses' => 'UsersController@delete',
  //   'as' => 'user.delete'
  // ]);
// });
