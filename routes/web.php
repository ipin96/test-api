<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('{id}/details', [UserController::class, 'details']);
    Route::post('create', [UserController::class, 'create']);
    Route::post('{id}/update', [UserController::class, 'update']);
    Route::post('{id}/delete', [UserController::class, 'delete']);
    Route::get('{offset}/{limit}/user', [UserController::class, 'get']);
});

Route::prefix('product')->group(function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('{id}/details', [ProductController::class, 'details']);
    Route::post('create', [ProductController::class, 'create']);
    Route::post('{id}/update', [ProductController::class, 'update']);
    Route::post('{id}/delete', [ProductController::class, 'delete']);
    Route::get('{offset}/{limit}/user', [ProductController::class, 'get']);
});
