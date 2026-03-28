<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDepartmentController;
use App\Http\Controllers\UserNetworkController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\AdminComplaintController;

use App\Models\User;
use App\Models\Network;
use App\Models\Port;
use App\Models\Complaint;
use App\Models\Department;

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

    Route::get('/dashboard', function () {
        $networksCount = Network::count();
        $portsCount = Port::count();
        $usersCount = User::count();
        $departmentsCount = Department::count();
        $complaintsCount = Complaint::count();

       $openComplaintsCount = Complaint::where(function ($query) {
    $query->whereNull('status')
        ->orWhereIn('status', [
            'new',
            'جديدة',
            'قيد المراجعة',
            'قيد المراجعه',
            'pending',
            'open',
            'in_review',
            'in progress',
        ]);
})->count();
        $solvedComplaintsCount = Complaint::whereIn('status', [
            'تم الحل',
            'محلولة',
            'محلوله',
            'solved',
            'resolved',
            'closed',
        ])->count();

        $latestComplaints = Complaint::with('user')->latest()->take(5)->get();
        $latestNetworks = Network::latest()->take(5)->get();
        $latestPorts = Port::latest()->take(5)->get();
        $latestUsers = User::latest()->take(5)->get();
        $latestDepartments = Department::latest()->take(5)->get();

        return view('dashboard', compact(
            'networksCount',
            'portsCount',
            'usersCount',
            'departmentsCount',
            'complaintsCount',
            'openComplaintsCount',
            'solvedComplaintsCount',
            'latestComplaints',
            'latestNetworks',
            'latestPorts',
            'latestUsers',
            'latestDepartments'
        ));
    })->name('dashboard');

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

    // إدارة الشكاوى بواسطة الأدمن
    Route::get('/admin/complaints', [AdminComplaintController::class, 'index'])->name('admin.complaints.index');
    Route::put('/admin/complaints/{id}/status', [AdminComplaintController::class, 'updateStatus'])->name('admin.complaints.updateStatus');
    Route::delete('/admin/complaints/{id}', [AdminComplaintController::class, 'destroy'])->name('admin.complaints.destroy');
});

/*
|--------------------------------------------------------------------------
| Routes اليوزر
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'nocache'])->group(function () {

    Route::get('/user-department', [UserDepartmentController::class, 'index'])->name('user.department');
    Route::get('/user-networks', [UserNetworkController::class, 'index'])->name('user.networks');
    Route::view('/user-team', 'user.team')->name('user.team');

    Route::get('/user-complaints', [ComplaintController::class, 'index'])->name('user.complaints');
    Route::post('/user-complaints', [ComplaintController::class, 'store'])->name('user.complaints.store');
    Route::delete('/user-complaints/{id}', [ComplaintController::class, 'destroy'])->name('user.complaints.destroy');
});

/*
|--------------------------------------------------------------------------
| Auth
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';