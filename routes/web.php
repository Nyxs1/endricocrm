<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Manager\ProjectApprovalController;

Route::get('/', fn() => redirect()->route('login'));

Route::get('/dashboard', fn() => view('dashboard'))
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::middleware('role:sales')->group(function () {
        Route::resource('leads', LeadController::class);
        Route::resource('projects', ProjectController::class);
        Route::post('/projects/{project}/submit', [ProjectController::class, 'submit'])
            ->name('projects.submit');
    });


    Route::middleware('role:sales,manager')->group(function () {
        Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
        Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
        Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
        Route::get('/services/{service}', [ServiceController::class, 'show'])->name('services.show');
        Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
        Route::put('/services/{service}', [ServiceController::class, 'update'])->name('services.update');
    });

    Route::middleware('role:sales,manager')->group(function () {
        Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
        Route::get('/customers/{customer}', [CustomerController::class, 'show'])->name('customers.show');
    });

    Route::middleware('role:manager')->prefix('manager')->name('manager.')->group(function () {
        Route::get('/projects', [ProjectApprovalController::class, 'index'])->name('projects.index');
        Route::get('/projects/{project}', [ProjectApprovalController::class, 'show'])->name('projects.show');
        Route::post('/projects/{project}/approve', [ProjectApprovalController::class, 'approve'])->name('projects.approve');
        Route::post('/projects/{project}/reject', [ProjectApprovalController::class, 'reject'])->name('projects.reject');
    });
});

require __DIR__ . '/auth.php';
