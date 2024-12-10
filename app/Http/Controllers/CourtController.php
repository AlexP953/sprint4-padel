<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Court;

class CourtController extends Controller
{
    public $courts;

    public function index()
    {    }

    public function getCourts() {
        return Court::all();
    }

    public function getOneCourt($id){
        return Court::find($id);
    }

    public function getReservationsOfCourt($id)
    {
        $court = $this->getOneCourt($id); 
        $reservations = $court->reservations; 
        return $reservations;
    }
}
