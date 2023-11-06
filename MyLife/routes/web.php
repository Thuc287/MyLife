<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\PostController;



Route::get('/',  [GuestController::class, 'home'])->name('home');
Route::post('/signIn',  [AccountController::class, 'signIn'])->name('signIn');
Route::post('/signUp',  [AccountController::class, 'signUp'])->name('signUp');
