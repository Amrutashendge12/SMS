<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\EventController;

// Admin
use App\Http\Controllers\Admin\AdminDashboardController;
use \App\Http\Controllers\Admin\FlatController;
use \App\Http\Controllers\Admin\WingController;
use \App\Http\Controllers\Admin\PhaseController;
use \App\Http\Controllers\Admin\SocietyController;
use \App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\SecurityController;
use App\Http\Controllers\Admin\AttendanceReportController;

// Owner
use App\Http\Controllers\Owner\SocietyController as OwnerSocietyController;
use App\Http\Controllers\Owner\PhaseController as OwnerPhaseController;
use App\Http\Controllers\Owner\WingController as OwnerWingController;
use App\Http\Controllers\Owner\FlatController as OwnerFlatController;
use App\Http\Controllers\Owner\SecurityController as OwnerSecurityController;
use App\Http\Controllers\Owner\AttendanceController as OwnerAttendanceController;
use App\Http\Controllers\Owner\DashboardController;

// Security
use App\Http\Controllers\Security\SecurityDashboardController;
use App\Http\Controllers\Security\ViewController;
use App\Http\Controllers\Security\AttendanceController;


/*
|--------------------------------------------------------------------------
| Public Route
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
   
});
Route::view('/about', 'about');
Route::view('/contact', 'contact');



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

        Route::resource('events', EventController::class);
        Route::resource('society', SocietyController::class);
        Route::resource('phase', PhaseController::class);
        Route::resource('wing', WingController::class);
        Route::resource('flat', FlatController::class);
        Route::resource('member', MemberController::class);
        Route::resource('securities', SecurityController::class);
        Route::get('/attendance', [AttendanceController::class, 'index'])
            ->name('attendance.index');

});

Route::middleware(['auth','role:owner'])
    ->prefix('owner')
    ->name('owner.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('events', EventController::class);

        Route::get('/societies', [OwnerSocietyController::class, 'index'])->name('societies.index');
        Route::get('/phases', [OwnerPhaseController::class, 'index'])->name('phases.index');
        Route::get('/wings', [OwnerWingController::class, 'index'])->name('wings.index');
        Route::get('/flats', [OwnerFlatController::class, 'index'])->name('flats.index');
        Route::get('/securities', [OwnerSecurityController::class, 'index'])->name('securities.index');
        Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');

});



Route::middleware(['auth', 'role:security'])
    ->prefix('security')
    ->name('security.')
    ->group(function () {

        // Route::get('/dashboard', fn () => view('security.dashboard'))
        //     ->name('dashboard');

        Route::get('/dashboard', [SecurityDashboardController::class, 'index'])
            ->name('dashboard');
        // 🔍 VIEW ONLY ROUTES
        Route::get('/societies', [ViewController::class, 'societies'])
            ->name('societies.index');

        Route::get('/phases', [ViewController::class, 'phases'])
            ->name('phases.index');

        Route::get('/wings', [ViewController::class, 'wings'])
            ->name('wings.index');

        Route::get('/flats', [ViewController::class, 'flats'])
            ->name('flats.index');

        Route::get('/owners', [ViewController::class, 'owners'])
            ->name('owners.index');
        
        Route::get('/attendance', [AttendanceController::class, 'index'])
            ->name('attendance.index');

        Route::get('/attendance/create', [AttendanceController::class, 'create'])
            ->name('attendance.create');

        Route::post('/attendance', [AttendanceController::class, 'store'])
            ->name('attendance.store');

         Route::get('events', [EventController::class, 'index'])->name('events.index');
    Route::get('events/{event}', [EventController::class, 'show'])->name('events.show');
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
