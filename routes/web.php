<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TestController;
use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\ThemeController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('users/data', [UserController::class, 'index'])->name('users.indexData');
    Route::resource('users', UserController::class);
    Route::get('themes/data', [ThemeController::class, 'index'])->name('themes.indexData');
    Route::resource('themes', ThemeController::class);
    //--------
    Route::resource('contents', ContentController::class);
    Route::resource('activitys', ActivityController::class);
    Route::resource('tests', TestController::class);
    Route::resource('media', MediaController::class);
    //---------
    Route::get('/home', [HomeController::class, 'index']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
