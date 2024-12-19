<?php

namespace App\Livewire;

use Livewire\Component;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourtController;


class AdminPanel extends Component
{
    public $reservations;
    public $users;
    public $courts;

    public $activeTab = 'reservas';

    public function setActiveTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function mount()
    {
        $reservationController = new ReservationController();
        $usersController = new UserController();
        $courtController = new CourtController();

        $this->reservations = $reservationController->getAllReservations();
        $this->users = $usersController->getAllUsers();
        $this->courts = $courtController->getAllCourts();
    }

    public function render()
    {
        return view('livewire.admin-panel')
        ->extends('layouts.app') 
        ->section('content');
    }
}
