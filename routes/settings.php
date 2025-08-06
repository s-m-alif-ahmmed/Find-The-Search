<?php

use App\Http\Controllers\Web\Backend\Setting\MapSettingController;
use App\Http\Controllers\Web\Backend\Settings\DynamicPageController;
use App\Http\Controllers\Web\Backend\Settings\MailSettingController;
use App\Http\Controllers\Web\Backend\Settings\ProfileController;
use App\Http\Controllers\Web\Backend\Settings\StripeSettingController;
use App\Http\Controllers\Web\Backend\Settings\SystemSettingController;
use App\Http\Controllers\Web\Backend\Settings\SocialMediaController;
use Illuminate\Support\Facades\Route;

//! Route for Profile Settings
Route::controller(ProfileController::class)->group(function () {
    Route::get('/profile', 'index')->name('profile.setting');
    Route::patch('/update-profile', 'UpdateProfile')->name('update.profile');
    Route::put('/update-profile-password', 'UpdatePassword')->name('update.Password');
    Route::post('/update-profile-picture', 'UpdateProfilePicture')->name('update.profile.picture');
});

//! Route for System Settings
Route::controller(SystemSettingController::class)->group(function () {
    Route::get('/system-setting', 'index')->name('system.index');
    Route::patch('/system-setting', 'update')->name('system.update');
});

//! Route for Mail Settings
Route::controller(MailSettingController::class)->group(function () {
    Route::get('/mail-setting', 'index')->name('mail.setting');
    Route::patch('/mail-setting', 'update')->name('mail.update');
});

//! Route for Stripe Settings
Route::controller(StripeSettingController::class)->group(function () {
    Route::get('/stripe-setting', 'index')->name('stripe.index');
    Route::get('/google-setting', 'google')->name('google.index');
    Route::patch('/credentials-setting', 'update')->name('credentials.update');
});


//! Route for Stripe Settings
Route::controller(MapSettingController::class)->group(function () {
    Route::get('/map-setting', 'index')->name('map.index');
    Route::patch('/map-setting', 'update')->name('map.update');
});

//! Route for Social Media
Route::controller(SocialMediaController::class)->group(function () {
    Route::get('/social', 'index')->name('social.index');
    Route::get('/social/create', 'create')->name('social.create');
    Route::post('/social/store', 'store')->name('social.store');
    Route::get('/social/edit/{id}', 'edit')->name('social.edit');
    Route::patch('/social/update/{id}', 'update')->name('social.update');
    Route::get('/social/status/{id}', 'status')->name('social.status');
    Route::delete('/social/delete/{id}', 'destroy')->name('social.destroy');
});

//! Route for Dynamic Page Settings
Route::controller(DynamicPageController::class)->name('settings.')->group(function () {
    Route::get('/dynamic-page', 'index')->name('dynamic_page.index');
    Route::get('/dynamic-page/create', 'create')->name('dynamic_page.create');
    Route::post('/dynamic-page/store', 'store')->name('dynamic_page.store');
    Route::get('/dynamic-page/edit/{id}', 'edit')->name('dynamic_page.edit');
    Route::patch('/dynamic-page/update/{id}', 'update')->name('dynamic_page.update');
    Route::get('/dynamic-page/status/{id}', 'status')->name('dynamic_page.status');
    Route::delete('/dynamic-page/delete/{id}', 'destroy')->name('dynamic_page.destroy');
});
