<?php

use App\Http\Controllers\{ChatGPT\ChatGptDestroyController,
    ChatGPT\ChatGptIndexController,
    ChatGPT\ChatGptStoreController,
    ImGPT\GptImageGenerationDelete,
    ImGPT\GptImageGenerationIndex,
    ImGPT\GptImageGenerationStore,
    ProfileController};
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile',       [ProfileController::class, 'edit'])     ->name('profile.edit');
    Route::patch('/profile',     [ProfileController::class, 'update'])   ->name('profile.update');
    Route::delete('/profile',    [ProfileController::class, 'destroy'])  ->name('profile.destroy');

    Route::get('/chat/{id?}',    ChatGptIndexController::class)  ->name('chat.show');
    Route::post('/chat/{id?}',   ChatGptStoreController::class)  ->name('chat.store');
    Route::delete('/chat/{chat}',ChatGptDestroyController::class)->name('chat.destroy');

    Route::get('/imgpt/{id?}',    GptImageGenerationIndex::class)->name('img.show');
    Route::post('/imgpt/{id?}',   GptImageGenerationStore::class)->name('img.store');
    Route::delete('/imgpt/{chat}',GptImageGenerationDelete::class)->name('img.delete');

});

require __DIR__ . '/auth.php';
