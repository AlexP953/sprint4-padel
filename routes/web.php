<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Home;
use App\Livewire\CreateReservation;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourtController;
use App\Livewire\MyReservations;
use App\Livewire\AdminPanel;

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/home', function () {
        return view('home'); 
    })->name('home');

    Route::get('/my-reservations', MyReservations::class)->name('my-reservations');
    Route::get('/create-reservation', CreateReservation::class)->name('create-reservation');
    Route::get('/admin-panel', AdminPanel::class)->name('admin-panel')->middleware('admin');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');


    Route::post('/create-court', [CourtController::class, 'store'])->name('courts.store');
    Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/courts/{court}', [CourtController::class, 'destroy']);
    Route::delete('/reservations/{reservation}', [ReservationController::class, 'destroy']);

});

Route::fallback(function () {
    return view('errors.404');
});

require __DIR__.'/auth.php';
