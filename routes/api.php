<?php

use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserTicketController;
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
// Route::get('get-user/{id}',[UserController::class, 'show']);
Route::post('register-user',[UserController::class, 'store']);
// Route::put('update-user/{id}',[UserController::class, 'update']);
// Route::get('get-users-name',[UserController::class, 'searchUserByParameter']);
// Route::delete('delete-user/{id}',[UserController::class, 'delete']);
// Tiket routes
Route::get('get-tickets',[TicketController::class, 'index']);
// Route::get('get-tickets/{id}',[TicketController::class, 'show']);
// Route::post('create-tickets',[TicketController::class, 'store']);
// User tickets route
// Route::get('get-user-tickets',[UserTicketController::class,'index']);
// Route::get('get-user-tickets/{id}',[UserTicketController::class, 'show']);
Route::post('create-user-tickets',[UserTicketController::class, 'store']);
