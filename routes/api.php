<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ComentController;
use App\Http\Controllers\AuthController;

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
//Registro
Route::post('newUser', [AuthController::class, "userRegister"]);
//login
Route::post('loginUser', [AuthController::class, "userLogin"]);
//USUARIOS
Route::get('User', [UserController::class, "showAllUser"]);//
Route::post('User', [UserController::class, "addUsers"]);//
Route::get('User/{id}', [UserController::class, "UsersByID"]);//
Route::put('User/{id}', [UserController::class, "UpdateUsers"]);//
Route::delete('User/{id}', [UserController::class, "DeleteUsers"]);//
//MENSAJES
Route::post('Chat', [ChatController::class, "createChat"]);//
Route::delete('Chat/{id}', [ChatController::class, "deleteChat"]);//
Route::get('Chat/{id}', [ChatController::class, "ChatbyID"]);//
Route::get('Chat', [ChatController::class, "showAllChat"]);//
;
