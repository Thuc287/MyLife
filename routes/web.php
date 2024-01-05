<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\PostController;


//guest
Route::get('/',  [GuestController::class, 'home'])->name('home');
Route::post('signIn',  [AccountController::class, 'signIn'])->name('signIn');
Route::post('signUp',  [AccountController::class, 'signUp'])->name('signUp');

//user
Route::get('user',  [UserController::class, 'home'])->name('user.home');
Route::get('user/myHome',  [UserController::class, 'myHome'])->name('user.myHome');
Route::get('/like/{post_id}',  [UserController::class, 'like'])->name('user.like');



Route::post('/createPost',  [PostController::class, 'createPost'])->name('post.create');
Route::get('/destroyPost/{post_id}',  [PostController::class, 'destroyPost'])->name('post.destroy');
Route::get('/viewComments/{post_id}',  [PostController::class, 'viewComments'])->name('post.viewComments');
Route::post('/comment',  [PostController::class, 'comment'])->name('post.comment');
