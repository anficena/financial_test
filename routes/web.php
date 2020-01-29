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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::resource('/user', 'UserController', ['except' => 'update']);
Route::post('/user/{id}', 'UserController@update')->name('users.update');
Route::get('/user/data/table', 'UserController@userDataTable')->name('user.table');

Route::resource('/category', 'CategoryController', ['except' => ['update', 'show']]);
Route::post('/category/{id}', 'CategoryController@update')->name('category.update');
Route::get('/category/data/table', 'CategoryController@categoryDataTable')->name('category.table');

Route::resource('/transaction', 'TransactionController', ['except' => ['update', 'show']]);
Route::post('/transaction/{id}', 'TransactionController@update')->name('transaction.update');
Route::get('/list/{type}/category', 'TransactionController@listCategory')->name('list.category');
Route::get('/filter/{start}/{end}/transaction', 'TransactionController@listCategory')->name('filter.transaction');
Route::get('/transaction/data/{start}/{end}/table', 'TransactionController@transactionDataTable')->name('transaction.table');
