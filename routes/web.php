<?php
use App\Http\Controllers\CovidController;
use App\Http\Controllers\CovidTestsController;
use App\Http\Controllers\BookingsController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\AppointmentController;
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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard'); 
});
Route::resource('covidstats', CovidController::class);
Route::get('/data', [CovidController::class, 'index'])->name('CovidStats.index');
Route::get('/information', [InformationController::class, 'index'])->name('information.index');
Route::get('/overview', [InformationController::class, 'overview'])->name('information.overview');
Route::get('/symptoms', [InformationController::class, 'symptoms'])->name('information.symptoms');
Route::get('/prevention', [InformationController::class, 'prevention'])->name('information.prevention');
Route::get('/vaccine', [InformationController::class, 'vaccine'])->name('information.vaccine');
Route::get('/effectiveness', [InformationController::class, 'effectiveness'])->name('information.effectiveness');
Route::get('/selfCare', [InformationController::class, 'selfCare'])->name('information.selfCare');
Route::get('/medicalTreatments', [InformationController::class, 'medicalTreatments'])->name('information.medicalTreatments');
Route::get('/orderhomekit', [CovidTestsController::class, 'create'])->name('covidtesting.orderhomekit');
Route::post('/orderhomekitSave', [CovidTestsController::class, 'store'])->name('covidtesting.save');


Route::get('/vaccine/booking', [BookingsController::class, 'create'])->name('booking.vaccine');
Route::post('/vaccine/save', [BookingsController::class, 'store'])->name('booking.save');



