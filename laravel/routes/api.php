<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\LoginController;

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



Route::prefix('auth')->group(function(){
    Route::post('/login', [LoginController::class, 'login']);
    // Route::post('/login', function(Request $request){return $request; });
});

// Route::middleware('auth:sanctum')->get('/user', function(Request $request){
//     return $request->user();
// });

Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::get('/user', function(Request $request){
        return $request->user();
    });

    Route::get('/sample', [ApiController::class, 'user']);
});