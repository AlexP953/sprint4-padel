<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Home;
use App\Livewire\CreateReservation;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\HomeController;
use App\Livewire\MyReservations;


Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', function () {
    return view('home'); 
})->name('home');

Route::get('/my-reservations', MyReservations::class)->name('my-reservations');
Route::get('/create-reservation', CreateReservation::class)->name('create-reservation');


Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
Route::delete('/reservations/{reservation}', [ReservationController::class, 'destroy']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
