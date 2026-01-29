<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminServiceController;
use App\Http\Controllers\AdminServiceToggleIsPublishedController;
use App\Http\Controllers\Userzone\ProfileController;

/*
|--------------------------------------------------------------------------
| Public routes
|--------------------------------------------------------------------------
*/

Route::get('/', WelcomeController::class);

Route::get('/products-search', \App\Livewire\ProductSearch::class);
Route::get('services', \App\Livewire\LocalServiceBrowser::class)
    ->name('services.index');

Route::get('services/{id}', [ServiceController::class, 'show'])
    ->name('services.show');

Route::post('services/add-comment', [CommentController::class, 'store'])
    ->name('comments.store');

Route::resource('categories', CategoryController::class)
    ->only(['index', 'show']);

/*
|--------------------------------------------------------------------------
| User dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('userzone.dashboard');
})->middleware(['auth', 'verified'])
    ->name('dashboard');

/*
|--------------------------------------------------------------------------
| Authenticated user routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'is_admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::resource('categories', AdminCategoryController::class);
    });


Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::resource('services', AdminServiceController::class);

        Route::get(
            'services/{service}/toggle-is-published',
            AdminServiceToggleIsPublishedController::class
        )->name('services.publish');
    });

/*
|--------------------------------------------------------------------------
| Auth routes (Breeze / Jetstream / etc.)
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';
