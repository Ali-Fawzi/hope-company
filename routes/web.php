<?php

use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StorageController;
use App\Http\Controllers\UserController;
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



Route::namespace('manager')->group(function () {
    Route::get('/dashboard',[ManagerController::class, 'index'])->name('manager.dashboard');
    Route::get('/users',[UserController::class,'index'])->name('manager.users');
    Route::get('/users/add',[UserController::class,'create'])->name('manager.user.add');
    Route::get('/users/groups',[ManagerController::class, 'groups'])->name('manager.users.groups');
    Route::get('/users/groups/addSalesPerson/{id}',[ManagerController::class, 'addSalesPerson'])->name('manager.users.groups.addSalesPerson');

    Route::post('users/setSalesPerson',[ManagerController::class, 'setSalesPersonToSupervisor']);
    Route::delete('users/unset',[ManagerController::class,'unset']);
    Route::post('/users/add',[UserController::class, 'store']);
    Route::post('/users/update',[UserController::class,'update']);
    Route::delete('/users/delete',[UserController::class , 'destroy']);

    Route::get('/storage', [StorageController::class, 'index'])->name('manager.storage');
    Route::get('/storage/add',[StorageController::class,'create'])->name('manager.storage.add');
    Route::post('/storage/add',[StorageController::class, 'store']);
    Route::post('/storage/update',[StorageController::class,'update']);
    Route::delete('/storage/delete',[StorageController::class , 'destroy']);
    Route::get('/test',function (){
        return view('pages.manager.test');
    })->name('manager.test');
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
