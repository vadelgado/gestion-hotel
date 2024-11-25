<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Counter\CounterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Receptionist\ReceptionistController;
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
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:1'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.index');
});

Route::middleware(['auth', 'role:2'])->group(function () {
    Route::get('/counter/dashboard', [CounterController::class, 'index'])->name('counter.index');
});

Route::middleware(['auth', 'role:3'])->group(function () {
    Route::get('/receptionist/dashboard', [ReceptionistController::class, 'index'])->name('receptionist.index');
});

require __DIR__.'/auth.php';
