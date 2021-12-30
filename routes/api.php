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
use App\Http\Controllers\MessageController;

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


//MIDELWARE
Route::middleware('auth:api')->group(function(){
//USERS

Route::get('Users', [UserController::class, "showAllUser"]);//
Route::post('User', [UserController::class, "addUsers"]);//
Route::get('User', [UserController::class, "UsersByID"]);//
Route::put('User', [UserController::class, "UpdateUsers"]);//
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

//FRIENDS

Route::post('Friend', [FriendController::class, "newfriend"]);//
Route::get('Friend', [FriendController::class, "showAllfriend"]);//
Route::get('Friend/{id}', [FriendController::class, "showfriendByID"]);//
Route::put('Friend/{id}', [FriendController::class, "updatefriend"]);//
Route::delete('Friend/{id}', [FriendController::class, "deletefriend"]);//


//POSTS

Route::post('Post', [PostController::class, "newpost"]);//
Route::get('Post', [PostController::class, "showAllpost"]);//
Route::get('Post/{id}', [PostController::class, "showpostByID"]);//
Route::put('Post/{id}', [PostController::class, "updatepost"]);//
Route::delete('Post/{id}', [PostController::class, "deletepost"]);//

//FRIENDS

Route::post('Coment', [ComentController::class, "newcoment"]);//
Route::get('Coment', [ComentController::class, "showAllcoment"]);//
Route::get('Coment/{id}', [ComentController::class, "showcomentByID"]);//
Route::put('Coment/{id}', [ComentController::class, "updatecoment"]);//
Route::delete('Coment/{id}', [ComentController::class, "deletecoment"]);//

//MESSAGE

Route::post('Message', [MessageController::class, "createmessage"]);//
Route::get('Message', [MessageController::class, "showAllmessage"]);//
Route::delete('Message/{id}', [MessageController::class, "deletemessage"]);//
});
