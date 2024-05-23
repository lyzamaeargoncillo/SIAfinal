<?php

use App\Http\Controllers\FlightController;
use App\Http\Controllers\PassengerController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});


//flights
Route::get('/flights', [FlightController::class, 'index'])->name('flights.index');
Route::get('/flights/{flight}/edit', [FlightController::class, 'edit'])->name('flights.edit');
Route::get('/flights/create', [FlightController::class, 'create'])->name('flights.create');
Route::post('/flights', [FlightController::class, 'store'])->name('flights.store');
Route::put('/flights/{flight}', [FlightController::class, 'update'])->name('flights.update');
Route::delete('/flights/{flight}', [FlightController::class, 'destroy'])->name('flights.destroy');
Route::put('/flight/{flight}', [FlightController::class, 'update']);
Route::get('/flight/pdf', [FlightController::class, 'pdf']);
Route::get('/flights/csv', [FlightController::class, 'generateCSV'])->name('flights.csv');

Route::get('/scanner', function () {
    return view('scanner');
});

//passengers
Route::get('/passengers', [PassengerController::class, 'index'])->name('passengers.index');
Route::get('/passengers/{passenger}/edit', [PassengerController::class, 'edit'])->name('passengers.edit');
Route::get('/passengers/create', [PassengerController::class, 'create'])->name('passengers.create');
Route::post('/passengers', [PassengerController::class, 'store'])->name('passengers.store');
Route::put('/passengers/{passenger}', [PassengerController::class, 'update'])->name('passengers.update');
Route::delete('/passengers/{passenger}', [PassengerController::class, 'destroy'])->name('passengers.destroy');
// Route::get('/passengers/export', [PassengerController::class, 'export'])->name('passengers.export');
// Route::get('/passengers/import', [PassengerController::class, 'import'])->name('passengers.import');
// Route::get('/passengers/import', [PassengerController::class, 'importForm'])->name('passengers.importForm');
// Route::post('/passengers/import', [PassengerController::class, 'import'])->name('passengers.import');

//bookings
Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
Route::get('/bookings/{booking}/edit', [BookingController::class, 'edit'])->name('bookings.edit');
Route::get('/bookings/create', 'BookingController@create')->name('bookings.create');
Route::get('/bookings/success', [BookingController::class, 'success'])->name('bookings.success');
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
Route::put('/bookings/{booking}', [BookingController::class, 'update'])->name('bookings.update');
Route::delete('/bookings/{booking}', [BookingController::class, 'destroy'])->name('bookings.destroy');


// Route::get('/passengers/csv', [PassengerController::class, 'generateCSV'])->name('passengers.csv');
// Route::get('/passengers/import', [PassengerController::class, 'showImportForm'])->name('passengers.import');
// Route::post('/passengers/import', [PassengerController::class, 'importCSV'])->name('passengers.import.post');
Route::get('passengers/export', [PassengerController::class, 'generateCSV'])->name('passengers.export');
Route::get('passengers/import', [PassengerController::class, 'showImportForm'])->name('passengers.importForm');
Route::post('passengers/import', [PassengerController::class, 'importCSV'])->name('passengers.import');


Route::get('/scanner', function () {
    return view('scanner');
        })->name('scanner');
