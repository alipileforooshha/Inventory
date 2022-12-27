<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
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
Route::get('/', function (){
    return redirect('/dashboard');
});
Route::view('/login','login')->name('login');
Route::post('/login',[AuthController::class, 'login'])->name('login.submit');
Route::get('/dashboard',[ItemController::class, 'index'])->name('dashboard')->middleware('auth');
// Route::get('/register',[AuthController::class, 'register']);
Route::group(['prefix'=>'items','as'=>"items."], function(){
    Route::post('/',[ItemController::class, 'store'])->name("create")->middleware('auth');
    Route::put('/{id}',[ItemController::class, 'update'])->name('update')->middleware('auth');
    Route::delete('/{id}',[ItemController::class, 'delete'])->name('delete')->middleware('auth');
    Route::post('/search',[ItemController::class, 'search'])->name('search')->middleware('auth');
});