<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\Dashboard\Post\PostController;
use App\Http\Controllers\Dashboard\Category\CategoryController;

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

Route::get('/', [HomePageController::class, 'index'])->name('home');
Route::get('tasteful-tales', [HomePageController::class, 'tastefulTales'])->name('tastefultales');
Route::get('travel-tips', [HomePageController::class, 'travelTips'])->name('traveltips');
Route::get('about-us', [HomePageController::class, 'aboutUs'])->name('about');
Route::post('/subscribe', NewsletterController::class)->name('subscribe');

Route::get('blog/{slug}', [HomePageController::class, 'show'])->name('blog.show');
Route::post('post/comment/{id}', [CommentController::class, 'makeComment'])->name('post.comment');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::resource('post', PostController::class);
    Route::resource('category', CategoryController::class);

    Route::delete('post/comment/{id}', [PostController::class, 'deletePostComment'])->name('comment.delete');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
