<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Customer\BenchBookingController;
use App\Http\Controllers\Customer\BenchController;
use App\Http\Controllers\Customer\CustomerWorkScheduleController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Customer\PaymentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Programmer\ProfileController;
use App\Http\Controllers\Programmer\UserSkillController;
use App\Http\Controllers\Programmer\WorkScheduleController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::get('/logout', [AuthController::class, 'delete'])->name('logout');
Route::post('/login', [AuthController::class, 'store'])->name('auth');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register');

Route::group(['middleware' => 'auth'], function () {
    //programmer
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/work_schedule', [WorkScheduleController::class, 'index'])->name('work_schedule');
    Route::post('/user/{user}/skill', [UserSkillController::class, 'store'])->name('user_skill');

    //customer
    Route::get('/benches', [BenchController::class, 'index'])->name('benches');
    Route::get('/benches_booking/{benches_booking}', BenchBookingController::class)->name('benches_booking');
    Route::get('/payment', [PaymentController::class, 'index'])->name('payment');
    Route::post('/payment', [PaymentController::class, 'store'])->name('payment_store');
    Route::get('/customer_work_schedule', [CustomerWorkScheduleController::class, 'index'])->name('customer_work_schedule');
    Route::get('/order', [OrderController::class, 'index'])->name('order');
});
