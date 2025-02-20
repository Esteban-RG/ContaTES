<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Nomina;
use Barryvdh\DomPDF\Facade\Pdf ;



class LicenciaController extends Controller
{
    public function show(Request $request): View
    {
        $user = User::with(['persona.empleado.permisos'])->find($request->user()->id); 

        // Verificar si el usuario existe
        if (!$user || !$user->persona || !$user->persona->empleado) {
            abort(404, 'Usuario no encontrado o sin datos de nómina');
        }

        // Obtener las nóminas si el usuario tiene un empleado asociado
        $permisos = $user->persona->empleado->permisos ?? collect(); // Evitar error si no hay relación

        return view('licencia', compact(['user', 'permisos']));
    }

    // public function details(Request $request, Nomina $nomina): View
    // {

    //     return view('details-nomina', compact('nomina'));
    // }

    // public function descargarPDF($id)
    // {
    //     $nomina = Nomina::with(['percepciones', 'deducciones'])->findOrFail($id);
    //     $pdf = Pdf::loadView('pdf.nomina', compact('nomina'));
        
    //     return $pdf->download('nomina_'.$id.'.pdf'); // Descargar el archivo PDF
    // }
}
