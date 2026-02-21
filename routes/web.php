<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\EventController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\ParkingController;
use App\Http\Controllers\BillController;

// Admin
use App\Http\Controllers\Admin\AdminDashboardController;
use \App\Http\Controllers\Admin\FlatController;
use \App\Http\Controllers\Admin\WingController;
use \App\Http\Controllers\Admin\PhaseController;
use \App\Http\Controllers\Admin\SocietyController;
use \App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\SecurityController;
use App\Http\Controllers\Admin\AttendanceReportController;
use App\Http\Controllers\Admin\AmenityBookingController;
use App\Http\Controllers\Admin\AmenityBookingController as AdminBookingController;
use App\Http\Controllers\Admin\AmenityController;

// Owner
use App\Http\Controllers\Owner\SocietyController as OwnerSocietyController;
use App\Http\Controllers\Owner\PhaseController as OwnerPhaseController;
use App\Http\Controllers\Owner\WingController as OwnerWingController;
use App\Http\Controllers\Owner\FlatController as OwnerFlatController;
use App\Http\Controllers\Owner\SecurityController as OwnerSecurityController;
use App\Http\Controllers\Owner\AttendanceController as OwnerAttendanceController;
use App\Http\Controllers\Owner\DashboardController;
use App\Http\Controllers\Owner\AmenityBookingController as OwnerBookingController;

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

        Route::resource('maintenance',MaintenanceController::class);
        Route::get('maintenance-graph', [MaintenanceController::class, 'graph'])
            ->name('maintenance.graph');
        
            // Admin full CRUD except index & show
        Route::resource('notices', NoticeController::class)->except(['index','show']);
       
        Route::resource('parkings', ParkingController::class);

        Route::get('parking-exit/{id}', [ParkingController::class,'exit'])
            ->name('parkings.exit');

        Route::resource('bills', BillController::class);

        Route::get('/bill/pay/{id}', [BillController::class,'pay'])->name('bill.pay');

            // Admin view page
        Route::get('/notices', [NoticeController::class,'index'])->name('notices.index');
        Route::get('/notices/{notice}', [NoticeController::class,'show'])->name('notices.show');
        Route::get('visitors', [VisitorController::class,'index'])->name('visitors.index');
        Route::resource('admin/amenities', \App\Http\Controllers\Admin\AmenityController::class);
        Route::get('amenity-bookings', [AmenityBookingController::class,'index'])
            ->name('bookings.pending');

        Route::get('amenity-bookings/approved', [AmenityBookingController::class,'approved'])
            ->name('bookings.approved');

        Route::get('amenity-bookings/rejected', [AmenityBookingController::class,'rejected'])
            ->name('bookings.rejected');

        Route::get('amenity-bookings/approve/{id}', [AmenityBookingController::class,'approve'])
             ->name('bookings.approve');

        Route::get('amenity-bookings/reject/{id}', [AmenityBookingController::class,'reject'])
            ->name('bookings.reject');
        Route::get('amenity-bookings/today', [AdminBookingController::class,'today'])->name('bookings.today');
    

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

       Route::resource('maintenance',MaintenanceController::class);
        Route::get('maintenance-graph', [MaintenanceController::class, 'graph'])
            ->name('maintenance.graph');

        Route::resource('events', EventController::class);

        Route::get('visitors', [VisitorController::class,'index']) ->name('visitors.index');
        Route::get('/notices', [NoticeController::class,'index'])->name('notices.index');
        Route::get('/notices/{notice}', [NoticeController::class,'show'])->name('notices.show');
        Route::get('/societies', [OwnerSocietyController::class, 'index'])->name('societies.index');
        Route::get('/phases', [OwnerPhaseController::class, 'index'])->name('phases.index');
        Route::get('/wings', [OwnerWingController::class, 'index'])->name('wings.index');
        Route::get('/flats', [OwnerFlatController::class, 'index'])->name('flats.index');
        Route::get('/securities', [OwnerSecurityController::class, 'index'])->name('securities.index');
        Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');

        Route::get('amenities-list', [AmenityBookingController::class,'index'])
        ->name('amenities.index');

        Route::get('amenities/book/{id}', [AmenityBookingController::class,'create'])
        ->name('amenities.book');

        Route::post('amenities/store', [AmenityBookingController::class,'store'])
        ->name('amenities.store');

        Route::get('my-bookings', [OwnerBookingController::class,'myBookings'])
         ->name('amenities.my');

        Route::get('parkings', [ParkingController::class,'index'])->name('parkings.index');

        Route::get('/bills', [BillController::class, 'ownerBills'])->name('bills.index');
        Route::post('/bills/pay/{id}', [BillController::class, 'pay'])->name('bills.pay');


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


        Route::get('/notices', [NoticeController::class,'index'])->name('notices.index');
        Route::get('/notices/{notice}', [NoticeController::class,'show'])->name('notices.show');
        Route::get('events', [EventController::class, 'index'])->name('events.index');
        Route::get('events/{event}', [EventController::class, 'show'])->name('events.show');
        Route::resource('maintenance',MaintenanceController::class);
        Route::resource('visitors', VisitorController::class)->except(['show','edit','update','destroy']);

        Route::get('visitors/exit/{id}', [VisitorController::class,'exit'])
            ->name('visitors.exit');
        Route::get('parkings', [ParkingController::class,'index'])->name('parkings.index');
        Route::get('parkings/create', [ParkingController::class,'create'])->name('parkings.create');

        Route::post('parkings/store', [ParkingController::class,'store'])->name('parkings.store');
       
    // Route::get('/amenities', [AmenityController::class, 'index'])
    //     ->name('amenities.index');

 Route::get('/amenities', function () {
        $amenities = \App\Models\Amenity::all();
        return view('security.amenities.index', compact('amenities'));
    })->name('amenities.index');

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
