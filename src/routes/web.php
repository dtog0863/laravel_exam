<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;


Route::get('/',[ContactController::class,'index']);
Route::post('/confirm',[ContactController::class,'confirm']);
Route::post('/thanks',[ContactController::class,'thanks']);

Route::get('/register', [AuthController::class, 'create']);
Route::post('/register',[AuthController::class,'register']);

Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login'])->middleware('web');

Route::get('/admin', [AuthController::class, 'admin'])->middleware('auth');
// Route::middleware('auth')->group(function(){
//     Route::get('/admin',[AuthController::class,'admin']);
// });
