<?php

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

Route::get('/', [App\Http\Controllers\TaskController::class, 'index']);
Route::post('/task', [App\Http\Controllers\TaskController::class, 'store']);
Route::patch('/task/{task}', [App\Http\Controllers\TaskController::class, 'update']);
Route::delete('/task/{task}', [App\Http\Controllers\TaskController::class, 'destroy']);
