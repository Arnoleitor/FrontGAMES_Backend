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
//REGISTER
Route::post('newUser', [AuthController::class, "userRegister"]);

//LOGIN

Route::post('loginUser', [AuthController::class, "userLogin"]);

//USERS

Route::get('User', [UserController::class, "showAllUser"]);//
Route::post('User', [UserController::class, "addUsers"]);//
Route::get('User/{id}', [UserController::class, "UsersByID"]);//
Route::put('User/{id}', [UserController::class, "UpdateUsers"]);//
Route::delete('User/{id}', [UserController::class, "DeleteUsers"]);//

//CHATS

Route::post('Chat', [ChatController::class, "createChat"]);//
Route::delete('Chat/{id}', [ChatController::class, "deleteChat"]);//
Route::get('Chat/{id}', [ChatController::class, "ChatbyID"]);//
Route::get('Chat', [ChatController::class, "showAllChat"]);//

//GROUPS

Route::post('Group', [GroupController::class, "newgroup"]);//
Route::get('Group', [GroupController::class, "showAllgroup"]);//
Route::get('Group/{id}', [GroupController::class, "showgroupByID"]);//
Route::delete('Group/{id}', [GroupController::class, "Deletegroup"]);//
Route::put('Group/{id}', [GroupController::class, "Updatetegroup"]);//
;
