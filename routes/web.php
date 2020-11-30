<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;

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

// post
Route::get('/post',[ImageController::class,'view']);
Route::post('/post',[ImageController::class,'store'])->name('store');
Route::get('/all-post',[ImageController::class,'show']);
Route::get('/view/{id}',[ImageController::class,'singleImg']);
Route::get('/edit/{id}',[ImageController::class,'edit']);
Route::post('/update',[ImageController::class,'update'])->name('update');
Route::get('/delete/{id}',[ImageController::class,'delete']);