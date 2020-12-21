<?php

use Illuminate\Support\Facades\Route;
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
Route::get('/', 'App\Http\Controllers\RegisterCustomerController@listCustomers');

Route::get('/register', 'App\Http\Controllers\RegisterCustomerController@showView');

Route::post('/cadastro-clientes', 'App\Http\Controllers\RegisterCustomerController@registerCustomer');

Route::get('/lista-clientes', 'App\Http\Controllers\RegisterCustomerController@listCustomers');

Route::post('/excluir-cliente', 'App\Http\Controllers\RegisterCustomerController@deleteCustomers');

Route::get('/alterar-cliente/{id}', 'App\Http\Controllers\RegisterCustomerController@showViewChangeCustomer');

Route::post('/alterar-cliente/{id}', 'App\Http\Controllers\RegisterCustomerController@updateCustomer');
