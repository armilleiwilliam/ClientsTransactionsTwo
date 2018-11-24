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

Route::get('/login','Auth\LoginController@getLogin');

Route::post('/login','Auth\LoginController@postLogin');

Route::get('/logout', 'HomeController@logoutUser');

Route::group(['middleware' => 'userAuth'], function () {
    Route::get('/home', 'HomeController@home');
    Route::get('/edit/{id}', 'UserController@edit');
    Route::get('/delete/{id}', 'UserController@delete');
    Route::post('/update', 'UserController@update');
    Route::get('/editclient/{id}', 'ClientsController@clientEdit');
    Route::get('/edittransaction/{id}', 'TransactionsController@transactionEdit');
    Route::get('/inserttransaction', 'TransactionsController@insertTransaction');
    Route::get('/insertclient', 'TransactionsController@insertClient');
    Route::get('/deleteclient/{id}', 'ClientsController@clientDelete');
    Route::get('/deletetransaction/{id}', 'TransactionsController@transactionDelete');
    Route::post('/createclient', 'ClientsController@clientCreate');
    Route::post('/createtransaction', 'TransactionsController@transactionCreate');
    Route::get('/clientslist', 'ClientsController@clientsList');
    Route::get('/transactionslist', 'TransactionsController@transactionsList');
    Route::post('/updateclient', 'ClientsController@clientUpdate');
    Route::post('/updatetransaction', 'TransactionsController@transactionUpdate');
});