<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\CauseController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\DashboardController as FrontendDashboardController;
use App\Http\Controllers\Frontend\DonationController;
use App\Http\Controllers\Frontend\EventController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\ResearchController;
use App\Http\Controllers\Frontend\TeamController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendDashboardController::class, 'index']);
Route::get('about', [PageController::class, 'about'])->name('about');
Route::get('search', [PageController::class, 'search'])->name('search');
Route::get('page/{slug}', [PageController::class, 'page'])->name('pages');
Route::get('services/{id}/{category}', [CauseController::class, 'category'])->name('causes');
Route::get('services/details/{id}/{title}', [CauseController::class, 'detail'])->name('causes.show');
Route::get('events', [EventController::class, 'index'])->name('events');
Route::get('events/{id}/{title}', [EventController::class, 'detail'])->name('events.show');
Route::get('research/{type}', [ResearchController::class, 'research'])->name('research');
Route::get('research/{id}/{title}', [ResearchController::class, 'detail'])->name('research.show');
Route::get('research/researcher/{research_id}/{name}', [ResearchController::class, 'researcher'])->name('research.researcher');
Route::get('research/partner/{partner_id}/{name}', [ResearchController::class, 'partner'])->name('research.partner');
Route::get('publications', [BlogController::class, 'index'])->name('blogs');
Route::get('publications/{id}/{title}', [BlogController::class, 'detail'])->name('blogs.show');
Route::get('research-publications/{research_id}/{title}', [BlogController::class, 'research'])->name('blogs.research');
Route::get('contacts', [ContactController::class, 'index'])->name('contacts');
Route::post('send-query', [ContactController::class, 'query'])->name('send.query');
Route::get('donations', [DonationController::class, 'index'])->name('donations');
Route::post('donations/store', [DonationController::class, 'store'])->name('donations.store');
Route::get('donations/causes/{id}/{title}', [DonationController::class, 'cause'])->name('donations.cause');
Route::get('teams', [TeamController::class, 'index'])->name('teams');
Route::get('team-detail/{id}/{name}', [TeamController::class, 'detail'])->name('teams.detail');
Route::get('references', [TeamController::class, 'reference'])->name('references');
Route::get('references/{id}/{name}', [TeamController::class, 'referenceDetail'])->name('references.show');

Route::group(['middleware' => ['auth']], function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::view('profile', 'backend/profile');
    Route::post('profile', [ProfileController::class, 'photo'])->name('profile');
    Route::post('password', [ProfileController::class, 'password'])->name('password.change');
    Route::post('profile-update', [ProfileController::class, 'update'])->name('profile.update');
});

require __DIR__ . '/auth.php';
