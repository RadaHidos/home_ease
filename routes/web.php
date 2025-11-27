<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Http\Controllers\WelcomeController::class);

Route::get('services', [\App\Http\Controllers\ServiceController::class, 'index'])->name('services.index');
Route::get('services/{id}', [\App\Http\Controllers\ServiceController::class, 'show'])->name('services.show');

Route::post('/services/add-comment', [\App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');


Route::resource('categories', \App\Http\Controllers\CategoryController::class)->only(['index', 'show']);




Route::get('/dashboard', function () {
    return view('userzone.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('admin/categories', \App\Http\Controllers\AdminCategoryController::class)
    ->middleware('is_admin');
    Route::resource('admin/services', \App\Http\Controllers\AdminServiceController::class);

    Route::get('admin/services/{service}/toggle-is-published',\App\Http\Controllers\AdminServiceToggleIsPublishedController::class) -> name('services.publish');
    

    Route::get('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
