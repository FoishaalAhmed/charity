<?php

use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CauseController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\GeneralController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\QueryController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VolunteerController;

Route::group(['prefix' => '/admin', 'as' => 'admin.', 'middleware' => ['admin', 'auth']], function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('contacts', [ContactController::class, 'index'])->name('contacts');
    Route::put('contacts/update/{id}', [ContactController::class, 'update'])->name('contacts.update');

    Route::get('queries', [QueryController::class, 'index'])->name('queries.index');
    Route::get('queries/show/{id}', [QueryController::class, 'show'])->name('queries.show');
    Route::delete('queries/destroy/{id}', [QueryController::class, 'destroy'])->name('queries.destroy');

    Route::resource('testimonials', TestimonialController::class);
    Route::resource('events', EventController::class);
    Route::resource('teams', TeamController::class);
    Route::resource('volunteers', VolunteerController::class);
    Route::resource('faqs', FaqController::class);
    Route::resource('pages', PageController::class);
    Route::resource('users', UserController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('partners', PartnerController::class)->except(['create', 'edit', 'show']);
    Route::resource('categories', CategoryController::class)->except(['create', 'edit', 'show']);
    Route::resource('sliders', SliderController::class)->except(['create', 'show']);
    Route::resource('generals', GeneralController::class);
    Route::resource('causes', CauseController::class);
    Route::resource('services', ServiceController::class);
});
