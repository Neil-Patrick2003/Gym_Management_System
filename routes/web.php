<?php

use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TutorialController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MembersController;
use App\Http\Controllers\Member\MemberController;
use App\Http\Controllers\Admin\ExercisesController;
use App\Http\Controllers\Member\UserProgramController;
use App\Http\Controllers\Admin\DailyExerciseController;
use App\Http\Controllers\Admin\ProgramScheduleController;
use App\Http\Controllers\Member\UserProgramDailyExercise;
use App\Http\Controllers\Admin\ProgramController as AdminProgramController;
use App\Http\Controllers\Member\ProgramController as MemberProgramController;

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
Route::get('/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
//member-index
Route::get('/admin/members', [MembersController::class, 'index']);
//update role
Route::patch('/admin/members/{member}', [MembersController::class, 'edit'] )->middleware(['auth', 'verified']);

//programs
//index
Route::get('/admin/programs', [AdminProgramController::class, 'index'])->middleware( ['auth', 'verified']);
//create
Route::get('/admin/programs/create', [AdminProgramController::class, 'create'])->middleware( ['auth', 'verified']);
//store
Route::post('/admin/programs', [AdminProgramController::class, 'store'])->middleware( ['auth', 'verified']);
//show

Route::get('/admin/programs/{program}', [AdminProgramController::class, 'show'])->middleware( ['auth', 'verified']);

//exercise
Route::get('/admin/exercises', [ExercisesController::class, 'index'])->middleware( ['auth', 'verified']);
Route::get('/admin/exercises/create', [ExercisesController::class, 'create'])->middleware( ['auth', 'verified']);
Route::post('/admin/exercises/create', [ExercisesController::class, 'store'])->middleware( ['auth', 'verified']);

//ProgramSchedule
Route::post('/admin/programs/program/{program}', [ProgramScheduleController::class, 'store'])->middleware( ['auth', 'verified']);
Route::post('/admin/programs/program/{program}/add_exercise', [DailyExerciseController::class, 'store'])->middleware( ['auth', 'verified']);


//tutorials
Route::get('/admin/tutorials', [TutorialController::class, 'index'])->middleware(['auth', 'verified']);



//user-side
Route::get('/home', [MemberController::class, 'index'])->middleware( ['auth', 'verified']);

Route::get('/member/programs', [MemberProgramController::class, 'index']);
Route::get('/member/programs/{program}', [MemberProgramController::class, 'show']);

//action to form
Route::post('/member/programs/{program}', [UserProgramController::class, 'store']);

//nav-myprogram
Route::get('member/myprogram', [UserProgramDailyExercise::class, 'index'] );
Route::get('member/myprogram/{program}', [UserProgramDailyExercise::class, 'show'] );







