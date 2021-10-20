<?php

use App\Http\Controllers\ApiController\ApiUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource('user', ApiUserController::class);


Route::group([
    'prefix' => 'auth',
], function(){

    Route::get('me', [\App\Http\Controllers\ApiController\ApiAuthController::class, 'me']);

    Route::post('login', [\App\Http\Controllers\ApiController\ApiAuthController::class, 'login']);

    Route::post('logout', [\App\Http\Controllers\ApiController\ApiAuthController::class, 'logout']);

});

