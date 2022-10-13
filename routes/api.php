<?php

use App\Http\Controllers\UserController;
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

// Routes for the API resource
// User routes
Route::get('get-all-users',[UserController::class, 'index']);
Route::get('get-user/{id}',[UserController::class, 'show']);
Route::post('register-users',[UserController::class, 'store']);
Route::put('update-user/{id}',[UserController::class, 'update']);
// Route::delete('delete-user/{id}',[UserController::class, 'delete']);
// Tiket routes
