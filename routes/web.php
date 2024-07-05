<?php

use Illuminate\Support\Facades\Route;
use App\Models\Area;
use App\Http\Controllers\TicketController;

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
    return view('landing', ['areas' => Area::with('locations')->get()]);
});

Route::post('/tickets', [TicketController::class, 'search'])->name('ticket.search');


Route::get('/order', function () {
    return view('order');
});
