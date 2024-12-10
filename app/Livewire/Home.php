<?php

namespace App\Livewire;

use Livewire\Component;
use App\Http\Controllers\CourtController;

class Home extends Component
{
    public $courts;
    public $alonecourt;

    public function mount()
    {
        $controller = new CourtController();
        $this->courts = $controller->getCourts();
        $this->alonecourt =  $controller->getOneCourt(1);
        $this->alonecourt =  $controller->getReservationsOfCourt(1);
    }

    public function render()
    {
        return view('livewire.home');
    }
}
