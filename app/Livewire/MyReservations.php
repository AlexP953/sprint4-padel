<?php

namespace App\Livewire;

use Livewire\Component;
use App\Http\Controllers\ReservationController;

class MyReservations extends Component
{
    public $reservations;
    public $user;

    public function mount()
    {
        $controller = new ReservationController();
        $this->user = auth()->user();
        $this->reservations = $controller->getMyReservations($this->user->id);
    }

    public function render()
    {
        return view('livewire.my-reservations');
    }
}
