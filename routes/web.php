<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;

//guesst-viwers
Route::get('/', function () {
    return view('welcome');//welcome
});
Route::get('/about', function () {
    return view('about');//about
});
Route::get('/gallery', function () {
    return view('gallery');//gallery
});
Route::get('/contact', function () {
    return view('contact');//contact
});

//both-side
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

//admin-side
Route::get('/dashboard', [AdminController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/members', [MemberController::class, 'index'] );

Route::patch('/admin/members/{member}', [MemberController::class, 'edit'] );

