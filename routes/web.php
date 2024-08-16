<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main');
});
Route::get('add',[UserController::class, 'create']);
Route::post('add',[UserController::class, 'store']);
Route::get('list',[UserController::class, 'index']);
Route::get('edit/{id}',[UserController::class, 'show'])->name('edit');
Route::put('edit/{id}',[UserController::class, 'update']);
Route::DELETE('destroy',[UserController::class, 'destroy']);
Route::post('upload/services',[UserController::class,'store']);
