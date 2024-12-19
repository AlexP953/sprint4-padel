<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Court;

class CourtController extends Controller
{
    public $courts;

    public function index()
    {    }

    public function getAllCourts() {
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

    public function store(Request $request)
    {
        $request->merge([
            'tipo_pista' => ucfirst(strtolower($request->input('tipo_pista'))),
        ]);
    
        $validatedData = $request->validate([
            'nombre' => 'required|unique:courts,nombre|regex:/^Pista \d+$/',
            'tipo_pista' => 'required|in:Tenis,Padel',
        ]);

        try {
            Court::create($validatedData);
            \Log::info('Pista creada correctamente', [$validatedData]);
            return redirect()->back()->with('success', 'Pista creada con éxito!');


        } catch (\Exception $e) {
            \Log::error('Error al crear la reserva', ['exception' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Algo ha fallado');
        }

    }

    public function destroy(int $courtId)
    {
        try {
            $court = Court::findOrFail($courtId);
            $court->delete(); 
            return response()->json([
                'message' => 'Pista eliminada correctamente',
                'success' => true
            ]);
        } catch (\Exception $e) {
            \Log::error('Error inesperado al eliminar la pista: ' . $courtId . ' - ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => ($e->getCode() == '23000') 
                ? 'No se puede eliminar la pista porque está vinculada a una o más reservas.'
                : 'Algo salió mal al intentar eliminar la pista. Intente de nuevo más tarde.',
            ], 500);
        }
    }
}
