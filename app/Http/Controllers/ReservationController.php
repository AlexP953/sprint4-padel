<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{

    public $user;


    public function mount()
    {}

    public function index()
    {}

    public function getAllReservations(){
        return Reservation::all();
    }

    public function getMyReservations($userId){
        $reservations = Reservation::where('id_user', $userId)->get();
        return $reservations;
    }

    public function create()
    {}


    public function formatDate($oldDate, $oldHour){
        $dateTime = new \DateTime($oldDate . ' ' . $oldHour);
        return $dateTime->getTimestamp();
    }

    public function store(Request $request)
    {
        $this->user = auth()->user();

        $request['pista'] = (int) $request['pista'];
        $validatedData = $request->validate([
            'date' => 'required|date|after_or_equal:today',
            'hour' => 'required',
            'pista' => 'required|integer|min:1|max:8',
        ]);
        

        $fechaCompleta = new \DateTime($validatedData['date'] . ' ' . $validatedData['hour']);
        $fecha_inicio = $fechaCompleta->format('Y-m-d H:i:s'); 
        $fecha_final = $fechaCompleta->modify('+1 hour')->format('Y-m-d H:i:s');

        $reservation = [
            'id_user' => $this->user->id,
            'fecha_inicio' => $fecha_inicio,
            'fecha_final' => $fecha_final,
            'id_pista' => $validatedData['pista'],
        ];

        try {
            Reservation::create($reservation);
            \Log::info('Reserva creada correctamente', [$reservation]);

        } catch (\Exception $e) {
            \Log::error('Error al crear la reserva', ['exception' => $e->getMessage()]);
        }
        

        return redirect()->back()->with('success', '¡Reserva creada con éxito!');

        

    }

    public function show(string $id)
    {}

    public function edit(string $id)
    {}

    public function update(Request $request, string $id)
    {
    }

    public function destroy(string $id)
    {}
}
