<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for this application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/fashion-accessories', function () {
    return view('fashion-accessories');
})->name('fashion-accessories');

Route::get('/components', function () {
    return view('components');
})->name('components');

Route::get('/necklaces', function () {
    return view('necklaces');
})->name('necklaces');

Route::get('/clutches', function () {
    return view('clutches');
})->name('clutches');

Route::get('/bangles', function () {
    return view('bangles');
})->name('bangles');

Route::get('/earrings', function () {
    return view('earrings');
})->name('earrings');

Route::get('/shoes', function () {
    return view('shoes');
})->name('shoes');

Route::get('/beaded-bags', function () {
    return view('beaded-bags');
})->name('beaded-bags');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard')->middleware('auth');
