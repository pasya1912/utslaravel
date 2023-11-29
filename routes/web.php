<?php

use App\Http\Controllers\JualanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',[JualanController::class,'index'])->name('home');
Route::get('/add',[JualanController::class,'add'])->name('add');
Route::get('/delete/{id}',[JualanController::class,'delete'])->where('id','[0-9]+')->name('delete');
Route::get('/edit/{id}',[JualanController::class,'edit'])->where('id','[0-9]+')->name('edit');
Route::post('/update/{id}',[JualanController::class,'update'])->where('id','[0-9]+')->name('update');
Route::post('/process',[JualanController::class,'action'])->name('process');
Route::get('/clear',[JualanController::class,'clear'])->name('clear');
