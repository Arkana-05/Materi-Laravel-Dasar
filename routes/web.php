<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('/product', function () {
    return view('product');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/logout', function () {
    return view('logout');
});

/* route khusus controller
Route::get('/', 'App\Http\Controllers\HomeController@home');*/

Route::get('/home', [HomeController::class, 'home']);
Route::get('/', [HomeController::class, 'welcome']);
Route::get('/product', [ProductController::class, 'product']);
Route::get('/product/create', [ProductController::class, 'create']);
Route::post('/product', [ProductController::class, 'store']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/logout', [HomeController::class, 'logout']);

Route::get('/edit/{id}', [ProductController::class, 'edit']);
Route::post('/edit/{id}', [ProductController::class, 'update']);
Route::delete('/product/{id}', [ProductController::class, 'destroy']);
