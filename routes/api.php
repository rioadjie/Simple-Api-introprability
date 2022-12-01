<?php

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
Route::post('/register', 
[App\Http\Controllers\API\AuthController::class, 'register']);

Route::post('/login', [App\Http\Controllers\API\AuthController::class, 
'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
    return auth()->user();
    });

});
Route::resource('programs',
App\Http\Controllers\API\ProgramController::class);

Route::resource('produk',
App\Http\Controllers\API\ProdukController::class);

Route::post('/logout', 
[App\Http\Controllers\API\AuthController::class, 'logout']);
