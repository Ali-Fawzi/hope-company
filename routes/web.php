<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landing');
});



Route::namespace('applicant')->prefix('applicant')->group(function () {
    Route::get('/dashboard', function () {
        return view('pages.applicant.dashboard');
    })->name('applicant.dashboard');
})->middleware(['auth', 'verified']);

Route::namespace('manager')->prefix('manager')->group(function () {
    Route::get('/dashboard', function () {
        return view('pages.manager.dashboard');
    })->name('manager.dashboard');
})->middleware(['auth', 'verified']);

Route::namespace('supervisor')->prefix('supervisor')->group(function () {
    Route::get('/dashboard', function () {
        return view('pages.supervisor.dashboard');
    })->name('supervisor.dashboard');
})->middleware(['auth', 'verified']);

Route::namespace('salesPerson')->prefix('salesPerson')->group(function () {
    Route::get('/dashboard', function () {
        return view('pages.salesPerson.dashboard');
    })->name('salesPerson.dashboard');
})->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
