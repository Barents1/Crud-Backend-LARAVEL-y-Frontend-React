<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MaterialController;

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


//Rutas para la entidad categoria
Route::get('/category', [CategoryController::class, 'index']);
Route::post('/category', [CategoryController::class, 'register']);
Route::delete('/category/{id}', [CategoryController::class, 'delete']);
Route::put('/category/{id}', [CategoryController::class, 'update']);


//Rutas para la entidad Material
Route::get('/materiale', [MaterialController::class, 'index']);
Route::post('/materiale', [MaterialController::class, 'register']);
Route::delete('/materiale/{id}', [MaterialController::class, 'delete']);
Route::put('/materiale/{id}', [MaterialController::class, 'update']);