<?php

use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SalesPersonController;
use App\Http\Controllers\StorageController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\TaskController;
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
    Route::resource('manager/sales', SalesController::class)->names('manager.sales');
    Route::get('manager/users/groups',[ManagerController::class, 'groups'])->name('manager.users.groups');
    Route::get('manager/users/groups/addSalesPerson/{id}',[ManagerController::class, 'addSalesPerson'])->name('manager.users.groups.addSalesPerson');
    Route::post('manager/users/setSalesPerson',[ManagerController::class, 'setSalesPersonToSupervisor']);
    Route::delete('manager/setSalesPerson/unset',[ManagerController::class,'unset'])->name('manager.unsetSalesPerson');
});

Route::middleware(['auth', 'supervisor'])->group(function () {
    Route::get('supervisor/dashboard',[SupervisorController::class, 'index'])->name('supervisor.dashboard');
    Route::get('supervisor/salesPersons',[SupervisorController::class, 'salesPersons'])->name('supervisor.salesPersons');
    Route::post('supervisor/salesPersons/kick',[SupervisorController::class, 'kick'])->name('supervisor.kickSalesPerson');
    Route::resource('supervisor/storage', StorageController::class)->names('supervisor.storage');
    Route::resource('supervisor/tasks',TaskController::class)->names('supervisor.tasks');
    Route::resource('supervisor/sales', SalesController::class)->names('supervisor.sales');
    Route::resource('supervisor/reports',ReportController::class)->names('supervisor.reports');
});

Route::middleware(['auth', 'salesPerson'])->group(function () {
    Route::get('salesPerson/dashboard',[SalesPersonController::class, 'index'])->name('salesPerson.dashboard');
    Route::resource('salesPerson/sales', SalesController::class)->names('salesPerson.sales');
    Route::get('salesPerson/tasks',[TaskController::class,'getTasks'])->name('salesPerson.tasks');
    Route::get('salesPerson/tasks/displayMyTask/{task}',[TaskController::class,'displayMyTask'])->name('salesPerson.showMyTask');
    Route::post('salesPerson/tasks/finished',[TaskController::class,'finished']);
    Route::resource('salesPerson/reports',ReportController::class)->names('salesPerson.reports');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
