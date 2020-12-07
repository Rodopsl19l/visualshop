<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\TrainingController;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/login', [LoginController::class, 'index']);
Route::post('login/redirect', [LoginController::class, 'redirect']);
Route::get('/register', [LoginController::class, 'register']);
Route::get('/forgotPassword', [LoginController::class, 'forgotPassword']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/training', [TrainingController::class, 'index']);
Route::get('/services', [ServicesController::class, 'index']);
Route::get('/about', [AboutUsController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/add', [AdminController::class, 'add']);
Route::get('/admin/edit/{contendId}', [AdminController::class, 'edit']);
Route::post('/admin/addContent', [AdminController::class, 'addContent']);
Route::get('/account', [AccountController::class, 'index']);
Route::get('/content/{contentId}', [ContentController::class, 'index']);
