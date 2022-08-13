<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MainmenuController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SliderController;
use Illuminate\Database\Eloquent\MassAssignmentException;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Mime\MessageConverter;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// route Page
Route::get('/', [PagesController::class, 'index']);
Route::get('about', [PagesController::class, 'about']);
Route::get('contact', [PagesController::class, 'contact']);
Route::get('post', [PagesController::class, 'post']);
Route::get('post-detail/{id}', [PagesController::class, 'postDetail']);
Route::get('menu/{id}', [PagesController::class, 'menu']);
Route::get('category/{id}', [PagesController::class, 'category']);
Route::get('search', [PagesController::class, 'search']);

Route::prefix('comment')->group(function () {
    Route::get('/', [CommentController::class, 'insert']);
});
Route::prefix('contact')->group(function () {
    Route::post('/', [MessageController::class, 'insert']);
});

//route admin
Route::get('register', [AdminController::class, 'register']);
Route::post('register', [AdminController::class, 'postRegister']);
Route::get('login', [AdminController::class, 'login']);
Route::post('login', [AdminController::class, 'postLogin']);
Route::get('logout', [AdminController::class, 'logout']);

//route Menu Admin
Route::middleware('checkLogin')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index']);

        //get create untuk menampilkan form tambah data
        //post create untuk menambahkan inputan form ke dalam database

        Route::prefix('category')->group(function () {
            Route::get('/', [CategoryController::class, 'index']);
            Route::get('create', [CategoryController::class, 'create']);
            Route::post('create', [CategoryController::class, 'insert_data']);
            Route::get('edit/{id}', [CategoryController::class, 'edit']);
            Route::post('edit/{id}', [CategoryController::class, 'update']);
            Route::get('delete/{id}', [CategoryController::class, 'delete']);
        });

        Route::prefix('slider')->group(function () {
            Route::get('/', [SliderController::class, 'index']);
            Route::get('create', [SliderController::class, 'create']);
            Route::post('create', [SliderController::class, 'insert']);
            Route::get('edit/{id}', [SliderController::class, 'edit']);
            Route::post('edit/{id}', [SliderController::class, 'update']);
            Route::get('delete/{id}', [SliderController::class, 'delete']);
        });

        Route::prefix('post')->group(function () {
            Route::get('/', [PostController::class, 'index']);
            Route::get('create', [PostController::class, 'create']);
            Route::post('create', [PostController::class, 'insert']);
            Route::get('edit/{id}', [PostController::class, 'edit']);
            Route::post('edit/{id}', [PostController::class, 'update']);
            Route::get('delete/{id}', [PostController::class, 'delete']);
        });

        Route::prefix('mainmenu')->group(function () {
            Route::get('/', [MainmenuController::class, 'index']);
            Route::get('create', [MainmenuController::class, 'create']);
            Route::post('create', [MainmenuController::class, 'insert']);
            Route::get('edit/{id}', [MainmenuController::class, 'edit']);
            Route::post('edit/{id}', [MainmenuController::class, 'update']);
            Route::get('delete/{id}', [MainmenuController::class, 'delete']);
        });

        Route::get('/message', [MessageController::class, 'index']);

        Route::get('/post_comment', [CommentController::class, 'index']);

        Route::prefix('profil')->group(function () {
            Route::get('{id}', [AdminController::class, 'edit']);
            Route::post('{id}', [AdminController::class, 'update']);
        });
    });
});
