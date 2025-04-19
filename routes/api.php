<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('get-users', [UserController::class, 'getUsers']);

Route::post('create-product', [ProductController::class, 'addNewProduct']);
