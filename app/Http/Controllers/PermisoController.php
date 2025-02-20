<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Permiso;
use Illuminate\Http\RedirectResponse;




class PermisoController extends Controller
{
    public function show(Request $request): View
    {
        $user = User::with(['persona.empleado.permisos'])->find($request->user()->id); 

        // Verificar si el usuario existe
        if (!$user || !$user->persona || !$user->persona->empleado) {
            abort(404, 'Usuario no encontrado o sin datos de nómina');
        }

        $permisos = $user->persona->empleado->permisos ?? collect(); 
        
        return view('permiso', compact(['user', 'permisos']));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'descripcion' => ['required', 'string', 'max:255'],
            'fecha' => ['required', 'date', 'after_or_equal:today'],
        ]);

        $permiso = Permiso::create([
            'descripcion' => $request->descripcion,
            'fecha' => $request->fecha,
            'estado' => 'pendiente',
            'empleado_id' => $request->user()->id 
        ]);


        return redirect()->route('show-permiso')->with('success', 'Permiso creado correctamente.');
    }


   
}
