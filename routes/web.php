<?php

use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\SalesPersonController;
use App\Http\Controllers\StorageController;
use App\Http\Controllers\SupervisorController;
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
Route::middleware(['auth', 'manager'])->group(function () {
    Route::get('manager/dashboard',[ManagerController::class, 'index'])->name('manager.dashboard');
    Route::resource('manager/users', UserController::class)->names('manager.users')->except('show');
    Route::resource('manager/storage', StorageController::class)->names('manager.storage');
    Route::resource('manager/salaries', SalaryController::class)->names('manager.salaries');
    Route::resource('manager/reports', ReportController::class)->names('manager.reports');
    Route::get('manager/users/groups',[ManagerController::class, 'groups'])->name('manager.users.groups');
    Route::get('manager/users/groups/addSalesPerson/{id}',[ManagerController::class, 'addSalesPerson'])->name('manager.users.groups.addSalesPerson');
    Route::post('manager/users/setSalesPerson',[ManagerController::class, 'setSalesPersonToSupervisor']);
    Route::delete('manager/setSalesPerson/unset',[ManagerController::class,'unset'])->name('manager.unsetSalesPerson');
});

Route::middleware(['auth', 'supervisor'])->group(function () {
    Route::get('supervisor/dashboard',[SupervisorController::class, 'index'])->name('supervisor.dashboard');

    Route::get('supervisor/test',function (){
        return view('pages.supervisor.test');
    })->name('supervisor.test');
});

Route::middleware(['auth', 'salesPerson'])->group(function () {
    Route::get('salesPerson/dashboard',[SalesPersonController::class, 'index'])->name('salesPerson.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
