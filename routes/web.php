<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MechanicController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

Route::get('/', function () {
    return redirect()->route('login');
});

// --- CPAMA ROLE-BASED DASHBOARDS ---

Route::middleware(['auth', 'verified'])->group(function () {

    // Main dashboard redirect — sends each role to their own dashboard
    Route::get('/dashboard', function () {
    $role = Auth::user()->role;

        if ($role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($role === 'mechanic') {
            return redirect()->route('mechanic.dashboard');
        } elseif ($role === 'senior_mechanic') {
            return redirect()->route('senior_mechanic.dashboard');
        } else {
            return redirect()->route('customer.dashboard');
        }
    })->name('dashboard');

    // ── ADMIN DASHBOARD ──
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');

    // ── USER MANAGEMENT ──
    Route::get('/admin/users',                [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/users/create',         [AdminController::class, 'createUser'])->name('admin.users.create');
    Route::post('/admin/users',               [AdminController::class, 'storeUser'])->name('admin.users.store');
    Route::get('/admin/users/{id}/edit',      [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::put('/admin/users/{id}',           [AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::patch('/admin/users/{id}/archive', [AdminController::class, 'archiveUser'])->name('admin.users.archive');
    Route::patch('/admin/users/{id}/restore', [AdminController::class, 'restoreUser'])->name('admin.users.restore');

    // ── ADMIN APPOINTMENTS ──
    Route::get('/admin/appointments',               [AdminController::class, 'appointments'])->name('admin.appointments');
    Route::post('/admin/appointments',              [AdminController::class, 'storeAppointment'])->name('admin.appointments.store');
    Route::patch('/admin/appointments/{id}/status', [AdminController::class, 'updateAppointmentStatus'])->name('admin.appointments.status');

    // ── ADMIN VEHICLES ──
    Route::get('/admin/vehicles',        [AdminController::class, 'vehicles'])->name('admin.vehicles');
    Route::post('/admin/vehicles',       [AdminController::class, 'storeVehicle'])->name('admin.vehicles.store');
    Route::put('/admin/vehicles/{id}',   [AdminController::class, 'updateVehicle'])->name('admin.vehicles.update');

    // ── ADMIN MAINTENANCE ──
    Route::get('/admin/maintenance', [AdminController::class, 'maintenance'])->name('admin.maintenance');
    Route::patch('/admin/maintenance/{task}/status', [AdminController::class, 'updateMaintenanceStatus'])->name('admin.maintenance.status');

    // ── ADMIN REPORTS ──
    Route::get('/admin/reports', [AdminController::class, 'reports'])->name('admin.reports');

    // ── CUSTOMER ──
    Route::get('/customer/dashboard',     [CustomerController::class, 'dashboard'])->name('customer.dashboard');
    Route::post('/customer/vehicles',     [CustomerController::class, 'storeVehicle'])->name('customer.vehicles.store');
    Route::get('/customer/appointments',  [CustomerController::class, 'appointments'])->name('customer.appointments');
    Route::patch('/customer/appointments/{id}/cancel', [CustomerController::class, 'cancelAppointment'])->name('customer.appointments.cancel');
    Route::post('/customer/appointments', [CustomerController::class, 'storeAppointment'])->name('customer.appointments.store');
    Route::get('/customer/history',       [CustomerController::class, 'history'])->name('customer.history');

    // ── SENIOR MECHANIC DASHBOARD (uses same mechanic dashboard) ──
    Route::get('/senior-mechanic/dashboard', [MechanicController::class, 'dashboard'])->name('senior_mechanic.dashboard');

    // ── MECHANIC DASHBOARD (placeholder) ──
    Route::get('/mechanic/dashboard',           [MechanicController::class, 'dashboard'])->name('mechanic.dashboard');
    Route::get('/mechanic/tasks',               [MechanicController::class, 'dashboard'])->name('mechanic.tasks');
    Route::patch('/mechanic/tasks/{id}/status', [MechanicController::class, 'updateTaskStatus'])->name('mechanic.tasks.status');
    Route::post('/mechanic/tasks/{id}/assign',  [MechanicController::class, 'assignTask'])->name('mechanic.tasks.assign');
    Route::get('/mechanic/inprogress',          [MechanicController::class, 'inProgress'])->name('mechanic.inprogress');
    Route::get('/mechanic/completed',           [MechanicController::class, 'completed'])->name('mechanic.completed');
    Route::get('/mechanic/team',                [MechanicController::class, 'team'])->name('mechanic.team');
    Route::get('/mechanic/reports',             [MechanicController::class, 'reports'])->name('mechanic.reports');
    Route::get('/mechanic/vehicles',            [MechanicController::class, 'vehicles'])->name('mechanic.vehicles');
    Route::get('/mechanic/assign',              [MechanicController::class, 'assign'])->name('mechanic.assign');
    Route::patch('/mechanic/tasks/{id}/notes', [MechanicController::class, 'saveNotes'])->name('mechanic.tasks.notes');

});

// --- DATABASE TEST ROUTE ---
Route::get('/test-db', function () {
    try {
        $count = User::count();
        return "Database connected! Total users: " . $count;
    } catch (\Exception $e) {
        return "Error: " . $e->getMessage();
    }
});

// --- PROFILE ROUTES ---
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

require __DIR__.'/auth.php';