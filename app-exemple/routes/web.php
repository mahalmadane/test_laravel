<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('products', ProductController::class);
Route::get('product/{id}', [ProductController::class, 'get_elementsById']);
Route::get('/delete_All', [ProductController::class, 'delete_All']);  

Route::get('/login', [AuthController::class, 'showlogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/register', [AuthController::class, 'showregister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('create_user');

Route::get('/dashboard/{name}', function (Request $request, $name) {
    return [
        "name" => $name
    ];
});