<?php

namespace App\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Reservation;
use App\Http\Controllers\CourtController;

class CreateReservation extends Component
{
    public $date;
    public $hour;
    public $court;
    public $allCourts;
    public $availableHours = [];
    public $selectedHour = null;
    public $selectedCourt = null;


    public function mount()
    {
        $courtController = new CourtController();
        $this->availableHours = [];
        $this->date = Carbon::now()->format('Y-m-d');
        $this->allCourts = $courtController->getAllCourts();
        $this->setAvailableHours();
    }

    public function updatedDate()
    {
        $this->setAvailableHours();
    }

    public function updateAvailableHours()
    {
        $this->setAvailableHours();
    }

    public function setAvailableHours()
    {
        $start = Carbon::createFromTime(8, 0);
        $end = Carbon::createFromTime(22, 0);
        $hours = [];
        
        while ($start < $end) {
            $hours[] = $start->format('H:i:s');
            $start->addHour();
        }
    
        $availables = [];
        foreach ($hours as $hour) {
            $availables[$hour] = [];
            foreach ($this->allCourts as $court) {
                $dateTime = Carbon::createFromFormat('Y-m-d H:i:s', "{$this->date} {$hour}");
                $reserved = Reservation::where('id_pista', $court->id)
                    ->where(function ($query) use ($dateTime) {
                        $query->where('fecha_inicio', '<', $dateTime->copy()->addHour()->format('Y-m-d H:i:s'))
                              ->where('fecha_final', '>', $dateTime->format('Y-m-d H:i:s'));
                    })
                    ->exists();
                $availables[$hour][$court->id] = !$reserved;
            }
        }
        $this->availableHours = $availables;
    }
    

    public function setReservation($hour, $court)
{
    $this->hour = $hour;
    $this->court = $court;
    if ($this->selectedHour === $hour && $this->selectedCourt === $court) {
        $this->selectedHour = null;
        $this->selectedCourt = null;
    } else {
        $this->selectedHour = $hour;
        $this->selectedCourt = $court;
    }
}


    public function render()
    {
        return view('livewire.create-reservation', [
            'availableHours' => $this->availableHours,
        ])
        ->extends('layouts.app') 
        ->section('content');   ;
    }
}
