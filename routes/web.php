<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TutorialController;
use App\Http\Controllers\TimeSheetController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MembersController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Member\MemberController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\ExercisesController;
use App\Http\Controllers\Trainer\ProgramController;
use App\Http\Controllers\Trainer\TrainerController;
use App\Http\Controllers\Trainer\ExerciseController;
use App\Http\Controllers\Member\AppointmentController;
use App\Http\Controllers\Member\UserProgramController;
use App\Http\Controllers\Admin\DailyExerciseController;
use App\Http\Controllers\Admin\ProgramScheduleController;
use App\Http\Controllers\Trainer\RecommendationController;
use App\Http\Controllers\Member\UserProgramDailyExerciseController;
use App\Http\Controllers\Admin\ProgramController as AdminProgramController;
use App\Http\Controllers\Member\ProgramController as MemberProgramController;
use App\Http\Controllers\Member\FeedbackController as MemberFeedbackController;
use App\Http\Controllers\Trainer\ExercisesController as TrainerExerciseController;
use App\Http\Controllers\Trainer\AppointmentController as TrainerAppointmentController;
use App\Http\Controllers\Member\RecommendationController as MemberRecommendationController;

//guesst-viwers
Route::get('/', function () {
    return view('welcome'); //welcome
});
Route::get('/about', function () {
    return view('about'); //about
});
Route::get('/gallery', function () {
    return view('gallery'); //gallery
});
Route::get('/contact', function () {
    return view('contact'); //contact
});
Route::get('/calculator', function () {
    return view('calculator');//contact
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
Route::patch('/admin/members/{member}', [MembersController::class, 'edit'])->middleware(['auth', 'verified']);

//programs
//index
Route::get('/admin/programs', [AdminProgramController::class, 'index'])->middleware(['auth', 'verified']);
//create
Route::get('/admin/programs/create', [AdminProgramController::class, 'create'])->middleware(['auth', 'verified']);
//store
Route::post('/admin/programs', [AdminProgramController::class, 'store'])->middleware(['auth', 'verified']);
//delete
Route::delete('/admin/programs/delete/{program}', [AdminProgramController::class, 'destroy']);
//show
Route::get('/admin/programs/{program}', [AdminProgramController::class, 'show'])->middleware(['auth', 'verified']);

//exercise
Route::get('/admin/exercises', [ExercisesController::class, 'index'])->middleware(['auth', 'verified']);
Route::get('/admin/exercises/create', [ExercisesController::class, 'create'])->middleware(['auth', 'verified']);
Route::post('/admin/exercises/create', [ExercisesController::class, 'store'])->middleware(['auth', 'verified']);

//ProgramSchedule
//index
Route::post('/admin/programs/program/{program}', [ProgramScheduleController::class, 'store'])->middleware(['auth', 'verified']);
Route::post('/admin/programs/program/{program}/add_exercise', [DailyExerciseController::class, 'store'])->middleware(['auth', 'verified']);

//payments
Route::get('/admin/payments', [PaymentController::class, 'index']);

//tutorials
Route::get('/admin/tutorials', [TutorialController::class, 'index'])->middleware(['auth', 'verified']);

//user-update-roles
Route::get('/admin/users', [UserController::class, 'index']);
//update role
Route::patch('/admin/users/{member}', [UserController::class, 'edit'])->middleware(['auth', 'verified']);

//payments
Route::post('admin/payments', [PaymentController::class, 'store']);

//feedback
Route::get('/admin/feedbacks', [FeedbackController::class, 'index']);





//traineer-side
Route::get('/trainer/home', [TrainerController::class, 'index'])->name('trainer_dashboard');
Route::get('/trainer/recommendations', [RecommendationController::class, 'index']);
Route::get('/trainer/recommendations/create/{user}', [RecommendationController::class, 'create']);
Route::post('/trainer/recommendations/create/{user}', [RecommendationController::class, 'store']);
Route::get('/trainer/programs', [ProgramController::class, 'index']);
Route::get('/trainer/programs/{program}', [ProgramController::class, 'show']);
Route::post('/trainer/programs/program/{program}', [ProgramScheduleController::class, 'store'])->middleware(['auth', 'verified']);
Route::post('/trainer/programs/program/{program}/add_exercise', [DailyExerciseController::class, 'store'])->middleware(['auth', 'verified']);
Route::get('/trainer/appointments', [TrainerAppointmentController::class, 'index']);
Route::patch('/trainer/appointments/{appointment}', [TrainerAppointmentController::class, 'update']);
Route::get('/trainer/exercises', [TrainerExerciseController::class, 'index']);
Route::get('/trainer/exercises/create', [TrainerExerciseController::class, 'create']);
Route::get('/trainer/tutorials', [TutorialController::class, 'index']);
Route::post('/trainer/tutorials/add_category', [TutorialController::class, 'store']);




//user-side
Route::get('/home', [MemberController::class, 'index'])->middleware(['auth', 'verified'])->name('member_dashboard');
//form action to choose trainer
Route::post('/home', [TimeSheetController::class, 'store']);
//user-program
Route::get('/member/programs', [MemberProgramController::class, 'index']);
//view-program
Route::get('/member/programs/{program}', [MemberProgramController::class, 'show']);

//action to form
Route::post('/member/programs/{program}', [UserProgramController::class, 'store']);

//nav-myprogram
Route::get('member/myprogram', [UserProgramController::class, 'index']);
Route::get('member/myprogram/{program}', [UserProgramController::class, 'show']);

//program schedule
Route::get('/member/myprogram/program/schedules/{user_program_schedule}/daily-exercises', [UserProgramDailyExerciseController::class, 'index']);
Route::patch('/member/myprogram/program/schedules/{user_program_schedule}/daily-exercises/{excercise}', [UserProgramDailyExerciseController::class, 'update']);

//appointment tab
Route::get('/member/appointments', [AppointmentController::class, 'index']);
Route::post('/member/appointments', [AppointmentController::class, 'store']);

//recommendation-tab
Route::get('/member/recommendations', [MemberRecommendationController::class, 'index']);

//feedback
Route::get('member/feedback', [MemberFeedbackController::class, 'index']);
Route::post('/member/feedback', [MemberFeedbackController::class, 'store']);
