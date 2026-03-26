<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDepartmentController;
use App\Http\Controllers\UserNetworkController;
use App\Http\Controllers\UserManagementController;

/*
|--------------------------------------------------------------------------
| الصفحة الرئيسية
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    if (auth()->check()) {
        return auth()->user()->role === 'admin'
            ? redirect()->route('dashboard')
            : redirect()->route('user.department');
    }

    return redirect()->route('login');
});

/*
|--------------------------------------------------------------------------
| Routes الأدمن
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'nocache', 'admin'])->group(function () {

    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::view('/networks', 'networks')->name('networks');
    Route::view('/devices', 'devices')->name('devices');
    Route::view('/ports', 'ports')->name('ports');
    Route::view('/active-devices', 'active-devices')->name('active-devices');
    Route::view('/wifi', 'wifi')->name('wifi');
    Route::view('/team', 'team')->name('team');
    Route::view('/profile', 'profile')->name('profile');

    // إدارة المستخدمين
    Route::get('/users', [UserManagementController::class, 'index'])->name('users.index');
    Route::post('/users', [UserManagementController::class, 'store'])->name('users.store');
    Route::put('/users/{user}', [UserManagementController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserManagementController::class, 'destroy'])->name('users.destroy');
});

/*
|--------------------------------------------------------------------------
| Routes اليوزر العادي
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'nocache'])->group(function () {

    Route::get('/user-department', [UserDepartmentController::class, 'index'])
        ->name('user.department');

    Route::get('/user-networks', [UserNetworkController::class, 'index'])
        ->name('user.networks');

    Route::view('/user-team', 'user.team')->name('user.team');
});

/*
|--------------------------------------------------------------------------
| Auth
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';