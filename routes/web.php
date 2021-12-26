<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\ArticlePublishController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\Reports\ResultController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleCommentsController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsCommentsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\StatisticController;
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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::name('contacts.')->prefix('contacts')->group(function() {
    Route::get('/', [ContactsController::class, 'create'])->name('create');
    Route::post('/store', [ContactsController::class, 'store'])->name('store');
});

Route::resource('articles', ArticleController::class);
Route::resource('articles.comments', ArticleCommentsController::class)->only(['store', 'edit', 'update']);

Route::resource('news', NewsController::class)->only(['index', 'show']);
Route::resource('news.comments', NewsCommentsController::class)->only(['store', 'edit', 'update']);

Route::get('/tags/{tag}', [TagController::class, 'show'])->name('tags.show');


Route::get('statistics', [StatisticController::class, 'index']);

Route::name('admin.')->prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('articles', \App\Http\Controllers\Admin\ArticleController::class)
        ->only(['index', 'edit', 'update']);

    Route::resource('news', \App\Http\Controllers\Admin\NewsController::class)->except(['show']);

    Route::patch('/article/{article}/published', [ArticlePublishController::class, 'published'])
        ->name('article.published');
    Route::patch('/article/{article}/unpublished', [ArticlePublishController::class, 'unpublished'])
        ->name('article.unpublished');

    Route::get('/feedback', [FeedbackController::class, 'index'])->name('index');

    Route::name('reports.')->prefix('reports')->group(function () {
        Route::get('/results', [ResultController::class, 'index'])->name('results.index');
        Route::post('/results', [ResultController::class, 'report'])->name('results.report');
    });

});

