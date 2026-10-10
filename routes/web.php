<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminJournalController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminSettingsController;
use App\Http\Controllers\OldDesign\CustomerCategoryController;

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
    return view('customer.landing');
});

Route::get('/bon-ace-fashion-tools', function () {
    return view('customer.fashion-tools');
})->name('bon-ace-fashion-tools');

Route::get('/home', function () {
    return view('old_design.home');
})->name('home');

Route::get('/fashion-accessories', function () {
    return view('old_design.fashion-accessories');
})->name('fashion-accessories');

Route::get('/components', [CustomerCategoryController::class, 'components'])->name('components');

Route::get('/necklaces', [CustomerCategoryController::class, 'necklaces'])->name('necklaces');

Route::get('/clutches', [CustomerCategoryController::class, 'clutches'])->name('clutches');

Route::get('/bangles', [CustomerCategoryController::class, 'bangles'])->name('bangles');

Route::get('/earrings', [CustomerCategoryController::class, 'earrings'])->name('earrings');

Route::get('/shoes', [CustomerCategoryController::class, 'shoes'])->name('shoes');

Route::get('/beaded-bags', [CustomerCategoryController::class, 'beadedBags'])->name('beaded-bags');
Route::get('/products/{product}', [CustomerCategoryController::class, 'product'])->name('products.show');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/admin-products', [AdminProductController::class, 'index'])->name('admin.products')->middleware('auth');
Route::post('/admin-products', [AdminProductController::class, 'store'])->name('admin.products.store')->middleware('auth');
Route::put('/admin-products/{product}', [AdminProductController::class, 'update'])->name('admin.products.update')->middleware('auth');
Route::delete('/admin-products/{product}', [AdminProductController::class, 'destroy'])->name('admin.products.destroy')->middleware('auth');
Route::get('/journal', [AdminJournalController::class, 'index'])->name('admin.journal')->middleware('auth');
Route::post('/journal', [AdminJournalController::class, 'store'])->name('admin.journal.store')->middleware('auth');
Route::put('/journal/{journalPost}', [AdminJournalController::class, 'update'])->name('admin.journal.update')->middleware('auth');
Route::delete('/journal/{journalPost}', [AdminJournalController::class, 'destroy'])->name('admin.journal.destroy')->middleware('auth');
Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users')->middleware('auth');
Route::post('/users', [AdminUserController::class, 'store'])->name('admin.users.store')->middleware('auth');
Route::get('/settings', [AdminSettingsController::class, 'index'])->name('admin.settings')->middleware('auth');
Route::put('/settings', [AdminSettingsController::class, 'update'])->name('admin.settings.update')->middleware('auth');
Route::get('/categories', function () {
    $categories = [
        ['name' => 'Components', 'description' => 'Essential components and parts.', 'icon' => 'bi-puzzle'],
        ['name' => 'Necklaces', 'description' => 'Statement and everyday necklaces.', 'icon' => 'bi-gem'],
        ['name' => 'Clutches', 'description' => 'Elegant clutches for every occasion.', 'icon' => 'bi-handbag'],
        ['name' => 'Bangles', 'description' => 'Handcrafted bangles and bracelets.', 'icon' => 'bi-circle'],
        ['name' => 'Earrings', 'description' => 'Distinctive earrings and accents.', 'icon' => 'bi-record-circle'],
        ['name' => 'Shoes', 'description' => 'Stylish footwear and essentials.', 'icon' => 'bi-brightness-high'],
        ['name' => 'Beaded Bags', 'description' => 'Handmade beaded bags and purses.', 'icon' => 'bi-bag'],
        ['name' => 'Home Décor', 'description' => 'Curated pieces for beautiful spaces.', 'icon' => 'bi-house-heart'],
        ['name' => 'Accent Furniture', 'description' => 'Unique furniture and statement pieces.', 'icon' => 'bi-lamp'],
        ['name' => 'Lighting', 'description' => 'Lighting with character and warmth.', 'icon' => 'bi-lightbulb'],
    ];

    return view('admin.categories', compact('categories'));
})->name('admin.categories')->middleware('auth');
