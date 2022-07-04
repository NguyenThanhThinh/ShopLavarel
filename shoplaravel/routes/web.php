<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\LoginController;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\LogoutController;

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


Route::get('/', function (){
return view('login');
})->name('login');

Route::post('/',[LoginController::class,'login']);

Route::get('/logout',[LogoutController::class,'getLogout'])->name('logout');

Route::group(['middleware' => 'auth', 'timeout'], function (){
    Route::get('/home',[HomeController::class,'index'])->name('home');

});
