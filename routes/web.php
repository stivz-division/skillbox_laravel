<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::name('contacts.')->prefix('contacts')->group(function() {
    Route::get('/', [ContactsController::class, 'create'])->name('create');
    Route::post('/store', [ContactsController::class, 'store'])->name('store');
});

Route::name('articles.')->prefix('articles')->group(function() {
    Route::get('/create', [ArticleController::class, 'create'])->name('create');
    Route::post('/store', [ArticleController::class, 'store'])->name('store');
    Route::get('/{article:slug}', [ArticleController::class, 'show'])->name('show');
});

Route::get('/admin/feedback', [FeedbackController::class, 'index'])->name('admin.index');
