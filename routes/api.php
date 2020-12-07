<?php

use App\Http\Controllers\Api\CommentsController;
use App\Http\Controllers\Api\PostImagesController;
use App\Http\Controllers\Api\PostsController;
use App\Http\Controllers\Api\PostVideosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UsersController;
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

//php artisan route:clear
//Then you have to manually delete the file bootstrap/cache/routes.php
Route::post('/users/login', [UsersController::class, 'login']);
Route::get('/posts/getNewer', [PostsController::class, 'getNewer']);
Route::post('/postImages/editImage', [PostImagesController::class, 'editImage']);
Route::post('/postVideos/editVideo', [PostVideosController::class, 'editVideo']);
Route::resource('users', UsersController::class);
Route::resource('posts', PostsController::class);
Route::resource('postImages', PostImagesController::class);
Route::resource('postVideos', PostVideosController::class);
Route::resource('comments', CommentsController::class);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
