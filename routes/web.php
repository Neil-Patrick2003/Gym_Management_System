<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//home
Route::get('/', function () {
    return view('welcome');
});
//about
Route::get('/about', function () {
    return view('about');
});
//galleryy
Route::get('/gallery', function () {
    return view('gallery');
});
//contact
Route::get('/contact', function () {
    return view('contact');
});

Route::get('/dashboard', [AdminController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
