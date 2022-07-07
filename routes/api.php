<?php

use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserController;
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

Route::group(['prefix'=>'v1','middleware'=>['auth:sanctum']],function(){
    //Escape Middleware
Route::post('login',[AuthenticationController::class,'login'])->withoutMiddleware(['auth:sanctum']);
Route::post('register',[AuthenticationController::class,'register'])->withoutMiddleware(['auth:sanctum']);
Route::post('logout',[AuthenticationController::class,'logout']);

Route::apiResource('/user',UserController::class);
Route::apiResource('/post',PostController::class);
Route::apiResource('/comment',CommentController::class);
Route::apiResource('/category',CategoryController::class);
});
