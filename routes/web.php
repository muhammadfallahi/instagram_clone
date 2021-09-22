<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlockController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\PostController;
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

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');



Route::get('/',[AuthController::class, 'showLogin'])
->name('auth.showLogin');

Route::get('login',[AuthController::class, 'showLogin'])
->name('auth.showLogin');


Route::post('login',[AuthController::class, 'login'])
->name('auth.login');

Route::get('register',[AuthController::class, 'showRegister'])
->name('auth.showRegister');

Route::post('register',[AuthController::class, 'register'])
->name('auth.register');

Route::middleware('auth')->group(function(){

Route::resource('user', UserController::class);

Route::resource('post', PostController::class);

Route::post('follow',[FollowController::class, 'follow'])
->name('follow.make');

Route::delete('follow',[FollowController::class, 'unfollow'])
->name('follow.delete');

Route::post('block',[BlockController::class, 'block'])
->name('block.make');

Route::delete('block',[BlockController::class, 'unblock'])
->name('block.delete');

});


