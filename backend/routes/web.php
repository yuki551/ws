<?php

use Illuminate\Support\Facades\Route;
// admin controller
use App\Http\Controllers\AdminController;
// dashboard controller
use App\Http\Controllers\HomeController;
// 日報管理用controller
use App\Http\Controllers\PostController;
// 日報一覧表示controller
use App\Http\Controllers\MyPostListController;
// 社員管理
use App\Http\Controllers\UserController;
// 顧客一覧表示controller

use App\Http\Controllers\ClientListController;
// 取引先登録
use App\Http\Controllers\ClientCreateController;

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

Route::get('/', function () {
    return view('login');
});

Route::redirect('/', 'dashboard');

Route::resource('dashboard', HomeController::class);
Route::resource('admin', AdminController::class);
Route::resource('/mypostlists', MyPostListController::class);
Route::resource('/clientlists', ClientListController::class);
Route::resource('/clients_create', ClientCreateController::class);

Route::get('/posts', [PostController::class, 'index'])
    ->name('post.index');
Route::get('/posts/create', [PostController::class, 'create'])
    ->name('post.create');
Route::post('/posts', [PostController::class, 'store'])
    ->name('post.store');
Route::put('/posts/{post}', [PostController::class, 'update'])
    ->name('post.update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])
    ->name('post.destroy');
Route::post('/posts/confirm', [PostController::class, 'confirm'])
    ->name('post.confirm');
Route::get('/posts/confirm', [PostController::class, 'getconfirm'])
    ->name('post.getconfirm');

Route::get('/users', [UserController::class, 'index'])
    ->name('user.index');
Route::get('/users/create', [UserController::class, 'create'])
    ->name('user.create');
Route::post('/users', [UserController::class, 'store'])
    ->name('user.store');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])
    ->name('user.edit');
Route::post('/users/confirm', [UserController::class, 'confirm'])
    ->name('user.confirm');
Route::post('/users/{user}', [UserController::class, 'update'])
    ->name('user.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])
    ->name('user.destroy');
Route::get('/users/confirm', [UserController::class, 'getconfirm'])
    ->name('user.getconfirm');
Route::get('/users/{user}', [UserController::class, 'show'])
    ->name('user.show');
