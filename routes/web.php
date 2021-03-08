<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicesController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([ 'middleware' => 'auth'], function(){
    Route::resource('service', 'App\Http\Controllers\ServicesController')->except(['show']);
 
    Route::group([ 'middleware' => 'admin', 'as' => 'admin.'], function(){
        Route::resource('admin/users', 'App\Http\Controllers\Admin\UsersController')->only(['index','update']);
        Route::resource('admin/services', 'App\Http\Controllers\Admin\ServicesController')->only(['index']);
    });
 
 });
