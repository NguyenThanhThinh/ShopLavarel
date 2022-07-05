<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\LoginController;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\LogoutController;
use \App\Http\Controllers\AgentController;

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


    Route::group(['prefix' => 'agents'], function () {
            Route::get('/',[AgentController::class,'index'])->name('agent_index');

            Route::get('/create',[AgentController::class,'create'])->name('create');

            Route::post('/add-agent',[AgentController::class,'store'])->name('store');

            Route::get('/edit-agent/{id}',[AgentController::class,'edit'])->name('agent_edit');

            Route::post('/update-agent/{id}',[AgentController::class,'update'])->name('agent_update');

            Route::get('/delete-agent/{id}',[AgentController::class,'destroy'])->name('agent_destroy');
    });
});

