<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DailyExerciseController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\ExercisesController;
use App\Http\Controllers\Admin\ProgramScheduleController;

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
//member-index
Route::get('/admin/members', [MemberController::class, 'index'] );
//update role
Route::patch('/admin/members/{member}', [MemberController::class, 'edit'] );

//programs
//index
Route::get('/admin/programs', [ProgramController::class, 'index']);
//create
Route::get('/admin/programs/create', [ProgramController::class, 'create']);
//store
Route::post('/admin/programs', [ProgramController::class, 'store']);
//show

Route::get('/admin/programs/program{program}', [ProgramController::class, 'show']);

//exercise
Route::get('/admin/exercises', [ExercisesController::class, 'index']);
Route::get('/admin/exercises/create', [ExercisesController::class, 'create']);
Route::post('/admin/exercises/create', [ExercisesController::class, 'store']);

//ProgramSchedule
Route::post('/admin/programs/program/{program}', [ProgramScheduleController::class, 'store']);
Route::post('/admin/programs/program/{program}/add_exercise', [DailyExerciseController::class, 'store']);







