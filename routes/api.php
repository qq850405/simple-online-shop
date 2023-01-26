<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/register', [UserController::class, 'register'])->name('api.register');
Route::post('/login', [UserController::class, 'login'])->name('api.login');
Route::get('/posts/uid={user}', [PostController::class, 'index']);
Route::get('/posts/post_id={post}', [PostController::class, 'show']);
Route::get('/products/seller_id={user}', [ProductController::class, 'index']);
Route::get('/products/product_id={product}', [ProductController::class, 'show']);


Route::group([
    'middleware' => 'auth:api',
], function () {
    Route::post('/logout', [UserController::class, 'logout']);

    Route::post('/posts', [PostController::class, 'store']);
    Route::post('/posts/{post}', [PostController::class, 'update']);
    Route::delete('/posts/{post}', [PostController::class, 'destroy']);

    Route::post('/products', [ProductController::class, 'store']);
    Route::post('/products/{product}', [ProductController::class, 'update']);
    Route::delete('/products/{product}', [ProductController::class, 'destroy']);
});
