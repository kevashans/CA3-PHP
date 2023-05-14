<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ForumsController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowingController;

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

Route::get('/', [PagesController::class, 'index']);

Route::resource('/blog', PostsController::class);

Route::resource('/forums', ForumsController::class);

Route::get('/search', [ForumsController::class, 'search'])->name('search');


Route::resource('/tags', TagsController::class);

Route::resource('/comment', CommentController::class);

Route::resource('/following', FollowingController::class);

Route::post('/following/delete', [FollowingController::class, 'delete'])->name('following.delete');

Route::get('/followed', [FollowingController::class, 'followedForums'])->name('following.followedForums');



Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/blog/search', 'App\Http\Controllers\PostsController@search')->name('blog.search');






