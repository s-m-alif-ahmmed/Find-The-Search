<?php

use App\Http\Controllers\Web\Frontend\HomeController;
use App\Http\Controllers\Web\Frontend\DashboardFrontendController;
use App\Http\Controllers\Web\Frontend\StripePaymentController;
use App\Http\Controllers\Web\Frontend\UserProfileController;
use App\Http\Controllers\Web\Frontend\ChallengeImageController;
use App\Http\Controllers\Web\Frontend\ChallengeVoteController;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Artisan;


//! Route for Landing Page
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/challenge', [HomeController::class, 'challenge'])->name('challenge');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact/store', [HomeController::class, 'contactStore'])->name('contact.store');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware('auth')->group(function () {

//    User Dashboard
    Route::get('/dashboard', [DashboardFrontendController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/dashboard/rank', [DashboardFrontendController::class, 'rank'])->name('dashboard.rank');
    Route::get('/dashboard/setting', [DashboardFrontendController::class, 'setting'])->name('dashboard.setting');
    Route::get('/dashboard/user/profile/{id}', [DashboardFrontendController::class, 'userProfile'])->name('user.profile');

    Route::post('/vote/{userId}', [ChallengeVoteController::class, 'store'])->name('vote.store');
    Route::post('/appreciate/{id}', [ChallengeVoteController::class, 'appreciateStore'])->name('appreciate.store');

//    User Profile Update
    Route::patch('/dashboard/setting/update', [UserProfileController::class, 'UpdateProfile'])->name('user.update.profile');
    Route::patch('/dashboard/setting/update/password', [UserProfileController::class, 'UpdatePassword'])->name('user.update.profile.password');

//    Challenge Payment
    Route::post('/stripe/checkout', [StripePaymentController::class, 'createCheckoutSession'])->name('stripe.checkout');
    Route::get('/success', [StripePaymentController::class, 'handleStripeResponse'])->name('stripe.success');


//    Challenge image upload
    Route::post('/challenge/image/upload', [ChallengeImageController::class, 'store'])->name('challenge.image.store');
    Route::delete('/challenge-image/{id}', [ChallengeImageController::class, 'destroy'])->name('delete.challenge.image');


});


require __DIR__ . '/auth.php';
