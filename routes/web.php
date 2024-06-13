<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/entry-value', function () {
    return view('entry-value', [
        "title" => "Entry Value"
    ]);
});

Route::get('/history', function () {
    return view('history', [
        "title" => "History"
    ]);
});

