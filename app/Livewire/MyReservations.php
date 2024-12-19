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
        $this->reservations = $this->setDate($this->reservations);
    }

    public function setDate($reservations){
        $reservations = json_decode($reservations); 
        foreach ($reservations as $reservation) {
            $dateTimeStart = new \DateTime($reservation->fecha_inicio);
            $dateTimeEnd = new \DateTime($reservation->fecha_final);
            $reservation->day = $dateTimeStart->format('Y-m-d');
            $reservation->hora_inicio = $dateTimeStart->format('H:i');
            $reservation->hora_final = $dateTimeEnd->format('H:i');
            unset($reservation->fecha_inicio, $reservation->fecha_final);
        }    
        return $reservations;
    }

    public function render()
    {
        return view('livewire.my-reservations')
            ->extends('layouts.app') 
            ->section('content');    
    }
}
