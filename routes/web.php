<?php

use App\Http\Controllers\SessionController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\SPKController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/weight-product', function () {
    return view('weight-product');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/entry-value', function () {
        return view('entry-value');
    })->name('entry-value');

    Route::get('/result-wp', [SPKController::class, 'showHasilWP']);

    Route::get('/profile', function () {
        return view('profile');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::group(['middleware' => 'checkLevel:admin'], function () {
        Route::get('/admin/setting', function () {
            return view('admin.setting');
        });
    });
});

// LOGIN

Route::get('/login', function () {
    return view('sesi.index', [
        "title" => "Masuk"
    ]);
})->middleware('isTamu')->name('index');
Route::get('/sesi', [SessionController::class, 'index'])->middleware('isTamu');
Route::post('/sesi/login', [SessionController::class, 'login'])->middleware('isTamu');
Route::match(['get', 'post'], '/sesi/logout', [SessionController::class, 'logout'])->name('logout');

// REGIST

Route::get('/sesi/register', [SessionController::class, 'register'])->middleware('isTamu')->name('register');
Route::post('/sesi/create', [SessionController::class, 'create'])->middleware('isTamu');

// PROFILE
Route::get('/profile', [ProfileController::class, 'show'])->middleware('auth');
Route::get('/edit-profile', [ProfileController::class, 'edit'])->middleware('auth');
Route::post('/edit-profile', [ProfileController::class, 'update'])->middleware('auth');

// GOOGLE

Route::get('/auth/redirect', [SocialController::class, 'redirect'])->name('google.redirect');
Route::get('/google/redirect', [SocialController::class, 'googleCallBack'])->name('google.callback');

// FORGOT PASSWORD

Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
Route::get('/sesi/lupa-password', function () {
    return view('/sesi/lupa-password');
});

// EMAIL VERIFICATION

Route::middleware(['auth', 'verified'])->group(function () {

});
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// KRITERIA

Route::get('/kriteria', [KriteriaController::class, 'index'])->name('kriteria.index')->middleware('auth');
Route::get('/kriteria/create', [KriteriaController::class, 'create'])->name('kriteria.create')->middleware('auth');
Route::post('/kriteria', [KriteriaController::class, 'store'])->name('kriteria.store')->middleware('auth');
Route::get('/kriteria/{id}/edit', [KriteriaController::class, 'edit'])->name('kriteria.edit')->middleware('auth');
Route::put('/kriteria/{id}', [KriteriaController::class, 'update'])->name('kriteria.update')->middleware('auth');
Route::delete('/kriteria/{id}', [KriteriaController::class, 'destroy'])->name('kriteria.destroy')->middleware('auth');

// ALTERNATIF

Route::post('/tambah-data', [DataController::class, 'store'])->name('tambah.data')->middleware('auth');
Route::post('/save-merek', [DataController::class, 'saveDataToMerekTable'])->name('save.merek')->middleware('auth');
Route::post('/save-nilai', [DataController::class, 'saveDataToNilaiTable'])->name('save.nilai')->middleware('auth');
Route::get('/entry-value', [DataController::class, 'showEntryValue'])->name('entry.value')->middleware('auth');

Route::get('/edit-data-alternatif/{id}', [DataController::class, 'edit'])->name('edit.data.alternatif')->middleware('auth');
Route::put('/update-data-alternatif/{id}', [DataController::class, 'update'])->name('update.data.alternatif')->middleware('auth');
Route::post('/hapus-data-alternatif/{id}', [DataController::class, 'destroy'])->name('hapus.data.alternatif')->middleware('auth');
Route::post('/truncate-tables', [DataController::class, 'truncateTables'])->name('hapus-tabel')->middleware('auth');


// SPK

Route::post('/hitung-wp', [SPKController::class, 'wp'])->name('hitung.wp')->middleware('auth');