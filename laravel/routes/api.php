<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Api\RestController;

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

Route::prefix('auth')->group(function () {
    Route::post('/login', [LoginController::class, 'login']);
    // Route::post('/login', function(Request $request){return $request; });
});

Route::get('/test', [ApiController::class, 'user']);

// Route::middleware('auth:sanctum')->get('/user', function(Request $request){
//     return $request->user();
// });

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/sample', [ApiController::class, 'user']);
});



Route::get('/get', [RestController::class, 'get'])->name('get');
Route::post('/add', [RestController::class, 'add'])->name('add');
Route::put('/edit', [RestController::class, 'edit'])->name('edit');
Route::delete('/remove', [RestController::class, 'remove'])->name('remove');
