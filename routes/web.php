<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlockController;
use App\Http\Controllers\DirectController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MentionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SaveController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Whoops\Run;

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


Route::post('logout', [AuthController::class, 'logout'])
->name('auth.logout');

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

Route::post('save/{id}', [SaveController::class, 'save'])
->name('save.post');

Route::get('save', [SaveController::class, 'index'])
->name('save.index');

Route::delete('save/{id}', [SaveController::class, 'unsave'])
->name('unsave.post');

Route::post('like/{id}/{type}', [LikeController::class, 'like'])
->name('like.post');

Route::delete('save/{id}/{type}', [LikeController::class, 'delike'])
->name('delike.post');

Route::get('explore',[ExploreController::class, 'index'])
->name('explore.index');


Route::post('search', [SearchController::class, 'search'])
->name('search.users');


Route::post('searchtags', [SearchController::class, 'searchTags'])
->name('search.tags');

Route::get('mention', [MentionController::class, 'index'])
->name('mention.index');

Route::get('direct', [DirectController::class, 'index'])
->name('direct.index');

Route::post('direct', [DirectController::class, 'saveChat'])
->name('direct.saveChat');


});


