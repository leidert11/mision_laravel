<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\AuthController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login',[AuthController::class, 'login']);

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function ($router){
    Route::get('list_all',[FilmController::class, 'show']);
    Route::post('detailed_list',[FilmController::class, 'index']);
    Route::post('new_movies',[FilmController::class, 'create']);
    Route::post('edit_info/{id}',[FilmController::class, 'update']);
    Route::get('/{id}',[FilmController::class,'delete']);
});

Route::group(['prefix'=>'customer','middleware' => ['auth', 'role:customer']], function ($router){
    Route::get('list_all',[FilmController::class, 'show']);
    Route::post('detailed_list',[FilmController::class, 'index']);
});
