<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;

// Admin
use App\Http\Controllers\Admin\AdminDashboardController;
use \App\Http\Controllers\Admin\FlatController;
use \App\Http\Controllers\Admin\WingController;
use \App\Http\Controllers\Admin\PhaseController;
use \App\Http\Controllers\Admin\SocietyController;
use \App\Http\Controllers\Admin\MemberController;

/*
|--------------------------------------------------------------------------
| Public Route
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| Dynamic Dashboard Redirect (ADD THIS HERE)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->get('/dashboard', function () {
    $role = Auth::user()->role;

    if ($role === 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif ($role === 'security') {
        return redirect()->route('security.dashboard');
    }

    return redirect()->route('owner.dashboard');
})->name('dashboard');
/*
|--------------------------------------------------------------------------
| Role Based Dashboards
|--------------------------------------------------------------------------
*/
Route::middleware(['auth','role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        Route::get('/profile/edit', [ProfileController::class, 'edit'])
            ->name('profile.edit');

        Route::post('/profile/update', [ProfileController::class, 'update'])
            ->name('profile.update');

        Route::resource('society', SocietyController::class);
        Route::resource('phase', PhaseController::class);
        Route::resource('wing', WingController::class);
        Route::resource('flat', FlatController::class);
        Route::resource('member', MemberController::class);

});


Route::middleware(['auth','role:owner'])->group(function () {
    Route::get('/owner/dashboard', function () {
        return view('owner.dashboard');
    })->name('owner.dashboard');
});

Route::middleware(['auth','role:security'])->group(function () {
    Route::get('/security/dashboard', function () {
        return view('security.dashboard');
    })->name('security.dashboard');
});

/*
|--------------------------------------------------------------------------
| Profile Routes (Common for all roles)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
