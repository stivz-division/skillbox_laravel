<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagController;
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

Route::resource('articles', ArticleController::class);

Route::get('/tags/{tag}', [TagController::class, 'show'])->name('tags.show');

Route::get('/admin/feedback', [FeedbackController::class, 'index'])->name('admin.index');

