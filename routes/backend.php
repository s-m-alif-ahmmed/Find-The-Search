<?php

use App\Http\Controllers\Web\Backend\DashboardController;
use App\Http\Controllers\Web\Backend\UserController;
use App\Http\Controllers\Web\Backend\Challenge\ChallengeController;
use App\Http\Controllers\Web\Backend\Contact\ContactController;
use App\Http\Controllers\Web\Backend\Faq\FaqController;
use App\Http\Controllers\Web\Backend\Announcement\AnnouncementController;
use App\Http\Controllers\Web\Backend\DashboardSlider\DashboardSliderController;
use Illuminate\Support\Facades\Route;

//! Route for Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/challenge-data', [DashboardController::class, 'getChallengeData'])->name('challenge-data');
//Challengers Data
Route::get('/challengers-data', [DashboardController::class, 'challengers'])->name('challengers-data');
//Challenge Upload images manage
Route::get('/challengers-image', [DashboardController::class, 'challengerImages'])->name('challengers-images');
Route::delete('/challengers-image-destroy/{id}', [DashboardController::class, 'challengerImagesDestroy'])->name('challengers-images.destroy');
//Challenge Vote manage
Route::get('/challenges-vote', [DashboardController::class, 'challengeVotes'])->name('challenge-votes');
Route::delete('/challenges-vote-destroy/{id}', [DashboardController::class, 'challengeVotesDestroy'])->name('challenges-votes.destroy');


//! Route for Users Page
Route::controller(UserController::class)->group(function () {
    Route::get('/user', 'index')->name('user.index');
    Route::get('/user/status/{id}', 'status')->name('user.status');
    Route::delete('/user/destroy/{id}', 'destroy')->name('user.destroy');
});

//! Route for Contacts Page
Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'index')->name('contact.index');
    Route::get('/contact/show/{id}', 'show')->name('contact.detail');
    Route::get('/contact/status/{id}', 'status')->name('contact.status');
    Route::delete('/contact/destroy/{id}', 'destroy')->name('contact.destroy');
});

//! Route for Challenges Page
Route::controller(ChallengeController::class)->group(function () {
    Route::get('/challenge', 'index')->name('challenge.index');
    Route::get('/challenge/{id}/leaderboard', 'indexLeaderboard')->name('challenge.index.leaderboard');
    Route::get('/challenge/create', 'create')->name('challenge.create');
    Route::post('/challenge/store', 'store')->name('challenge.store');
    Route::get('/challenge/edit/{id}', 'edit')->name('challenge.edit');
    Route::patch('/challenge/update/{id}', 'update')->name('challenge.update');
    Route::get('/challenge/status/{id}', 'status')->name('challenge.status');
    Route::delete('/challenge/destroy/{id}', 'destroy')->name('challenge.destroy');
});

//! Route for FAQ
Route::controller(FaqController::class)->group(function () {
    Route::get('/faq', 'index')->name('faq.index');
    Route::get('/faq/create', 'create')->name('faq.create');
    Route::post('/faq/store', 'store')->name('faq.store');
    Route::get('/faq/edit/{id}', 'edit')->name('faq.edit');
    Route::patch('/faq/update/{id}', 'update')->name('faq.update');
    Route::get('/faq/status/{id}', 'status')->name('faq.status');
    Route::delete('/faq/destroy/{id}', 'destroy')->name('faq.destroy');
});

//! Route for Announcement
Route::controller(AnnouncementController::class)->group(function () {
    Route::get('/announcement', 'index')->name('announcement.index');
    Route::get('/announcement/create', 'create')->name('announcement.create');
    Route::post('/announcement/store', 'store')->name('announcement.store');
    Route::get('/announcement/edit/{id}', 'edit')->name('announcement.edit');
    Route::patch('/announcement/update/{id}', 'update')->name('announcement.update');
    Route::get('/announcement/status/{id}', 'status')->name('announcement.status');
    Route::delete('/announcement/destroy/{id}', 'destroy')->name('announcement.destroy');
});

//! Route for Announcement
Route::controller(DashboardSliderController::class)->group(function () {
    Route::get('/dashboard/slider', 'index')->name('dashboard.slider.index');
    Route::get('/dashboard/slider/create', 'create')->name('dashboard.slider.create');
    Route::post('/dashboard/slider/store', 'store')->name('dashboard.slider.store');
    Route::get('/dashboard/slider/edit/{id}', 'edit')->name('dashboard.slider.edit');
    Route::patch('/dashboard/slider/update/{id}', 'update')->name('dashboard.slider.update');
    Route::get('/dashboard/slider/status/{id}', 'status')->name('dashboard.slider.status');
    Route::delete('/dashboard/slider/destroy/{id}', 'destroy')->name('dashboard.slider.destroy');
});



