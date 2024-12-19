<?php

namespace App\Livewire;

use Livewire\Component;
use App\Http\Controllers\CourtController;

class Home extends Component
{
    public $courts;

    public function mount()
    {
        $controller = new CourtController();
        $this->courts = $controller->getAllCourts();
    }

    public function render()
    {
        return view('livewire.home');
    }
}
