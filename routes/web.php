<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChatsController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth:sanctum','verified')->get('/',function(){
    return view('welcome');
})->name('home');

Route::group(['middleware'=>['auth:sanctum','verified','admin'],'prefix'=>'admin'],function(){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::resource('/users', UserController::class);
    Route::delete('users-delete',[UserController::class,'deleteSelected'])->name('deleteSelected');
    Route::put('users-update/{photo}',[UserController::class,'updatePhoto'])->name('updateUserPhoto');
    Route::resource('/posts',PostController::class);
    Route::delete('posts-delete-all',[PostController::class,'deletePosts'])->name('deletePosts');
    Route::put('posts-update/{image}',[PostController::class,'updateImage'])->name('updatePostImage');
    Route::resource('/categories',CategoryController::class);
    Route::delete('/categories-delete',[CategoryController::class,'deleteAllCategory'])->name('deleteCategoriesSelected');
    Route::get('/comments',[CommentController::class,'index'])->name('comments.index');
    Route::post('/comment/create/{post}',[CommentController::class,'makeComment'])->name('makeComment');
    Route::put('/comment/update/{comment}',[CommentController::class,'updateComment'])->name('updateComment');
    Route::put('/comments/{comment}',[CommentController::class,'update'])->name('comment.updateStatus');
    Route::delete('/comments/{comment}',[CommentController::class,'destroy']);
    Route::delete('/comments-delete/all',[CommentController::class,'deleteComments'])->name('deleteComments');
    Route::get('/chat',[ChatsController::class,'index'])->name('chat');
    Route::get('/talk-with/{user}',[ChatsController::class,'talk'])->name('talk');
    Route::post('/send-message',[ChatsController::class,'sendMessage'])->name('sendMessage');
});


