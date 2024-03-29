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

// Route::get('/', function () {
//     return redirect('admin');
// });
//
// Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'XSS']], function () {
//     Route::get('/', 'AdminHomeController@index');
// });
// Route::get('/', 'AdminHomeController@index');
Route::group(['middleware' => ['auth', 'XSS']], function () {
    // Route::get('login', 'Auth\LoginController@login');
    Route::get('/', 'AdminHomeController@index');
});
