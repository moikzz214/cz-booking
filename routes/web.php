<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
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
    return view('welcome');
});

Route::post('/v/booking/submit', [BookingController::class, 'store'])->name('booking.store.new');
Route::get('/v/booking/get-data',  [BookingController::class, 'fetch'])->name('fetch.all');