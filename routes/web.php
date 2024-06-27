<?php

use App\Http\Controllers\SessionController;
use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::middleware(['isLogin'])->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::get('/entry-value', function () {
        return view('entry-value');
    });

    Route::get('/result-wp', function () {
        return view('result-wp');
    });

    Route::get('/weight-product', function () {
        return view('weight-product');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::group(['middleware' => 'checkLevel:admin'], function () {
        Route::get('/admin/setting', function () {
            return view('admin.setting');
        });
    });
});

Route::get('/', function () {
    return view('sesi/index', [
        "title" => "Masuk"
    ]);
})->middleware('isTamu');
Route::get('/sesi', [SessionController::class, 'index'])->middleware('isTamu');
Route::post('/sesi/login', [SessionController::class, 'login'])->middleware('isTamu');
Route::match(['get', 'post'], '/sesi/logout', [SessionController::class, 'logout'])->name('logout');


Route::get('/sesi/register', [SessionController::class, 'register'])->middleware('isTamu');
Route::get('/sesi/register', function () {
    return view('/sesi/register', [
        "title" => "Register"
    ]);
})->middleware('isTamu');
Route::post('/sesi/create', [SessionController::class, 'create'])->middleware('isTamu');

// GOOGLE

Route::get('/auth/redirect', [SocialController::class, 'redirect'])->name('google.redirect');
Route::get('/google/redirect', [SocialController::class, 'googleCallBack'])->name('google.callback');