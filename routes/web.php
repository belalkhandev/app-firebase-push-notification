<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\NotificationController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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


Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('/', function () {
        return Inertia::render('Dashboard', [
            'canLogin' => Route::has('login'),
        ]);
    });


    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/applications', [ApplicationController::class, 'index'])->name('application.list');
    Route::get('/applications/create', [ApplicationController::class, 'create'])->name('application.create');
    Route::post('/applications/create', [ApplicationController::class, 'store'])->name('application.store');

    Route::get('/notifications', [NotificationController::class, 'index'])->name('notification.list');

    Route::get('/clients', [ApplicationController::class, 'index'])->name('client.list');
});


require __DIR__.'/auth.php';
