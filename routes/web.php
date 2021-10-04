<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\CauseController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\DashboardController as FrontendDashboardController;
use App\Http\Controllers\Frontend\DonationController;
use App\Http\Controllers\Frontend\EventController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\VolunteerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendDashboardController::class, 'index']);
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/causes', [CauseController::class, 'index'])->name('causes');
Route::get('/causes/{id}/{title}', [CauseController::class, 'detail'])->name('causes.show');
Route::get('/category-causes/{category_id}/{name}', [CauseController::class, 'category'])->name('causes.category');
Route::get('/events', [EventController::class, 'index'])->name('events');
Route::get('/events/{id}/{title}', [EventController::class, 'detail'])->name('events.show');
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
Route::get('/blogs/{id}/{title}', [BlogController::class, 'detail'])->name('blogs.show');
Route::get('/category-blogs/{category_id}/{name}', [BlogController::class, 'category'])->name('blogs.category');
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');
Route::post('/send-query', [ContactController::class, 'query'])->name('send.query');
Route::get('/donations', [DonationController::class, 'index'])->name('donations');
Route::post('/donations/store', [DonationController::class, 'store'])->name('donations.store');
Route::get('/donations/causes/{id}/{title}', [DonationController::class, 'cause'])->name('donations.cause');
Route::get('/volunteers', [VolunteerController::class, 'index'])->name('volunteers');
Route::get('/become-volunteers', [VolunteerController::class, 'volunteer'])->name('volunteers.become');

Route::group(['middleware' => ['auth']], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::view('/profile', 'backend/profile');
    Route::post('/profile', [ProfileController::class, 'photo'])->name('profile');
    Route::post('/password', [ProfileController::class, 'password'])->name('password.change');
    Route::post('/profile-update', [ProfileController::class, 'update'])->name('profile.update');
});

require __DIR__ . '/auth.php';
