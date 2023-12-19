<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\PostCondition;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/





Route::get('/', [PostController::class, 'index']);
Route::get('/post-data', [PostController::class, 'getData'])->name('post-data');


Route::get('/ck', [PostController::class, 'ckeditor']);



Route::post('/test', [PostController::class, 'kiemtraInput'])->middleware('web')->name('check');


// Route::post('/test', [PostController::class, 'uploadImage'])->name('upImage');
