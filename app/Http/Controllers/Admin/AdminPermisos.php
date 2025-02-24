<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Permiso;
use Illuminate\Http\RedirectResponse;





class AdminPermisos extends Controller
{
    public function show(): View
    {
        $permisos = Permiso::where('estado', 'pendiente')->get();

        return view('admin.permisos', compact('permisos'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'dia_no_laboral' => ['required', 'date','unique:permisos,dia_no_laboral'],
            'descripcion' => ['required', 'string', 'max:255'],
        ]);


        $permisos = Permiso::create([
            'dia_no_laboral' => $request->dia_no_laboral,
            'descripcion' => $request->descripcion,
        ]);


        return redirect()->route('admin-permisos')->with('success', 'Dia no laboral creado correctamente.');
    }

    public function destroy(Permiso $permisos) : RedirectResponse 
    {

        $permisos->delete();

        return redirect()->route('admin-permisos')->with('success', 'Dia no laboral eliminado correctamente.'); 
        
    }

    public function edit(Permiso $permisos): View
    {
        return view('admin.edit-permisos', compact('permisos'));
    }

    public function update(Request $request, Permiso $permisos): RedirectResponse
    {
        $request->validate([
            'dia_no_laboral' => ['required', 'date'],
            'descripcion' => ['required', 'string', 'max:255'],
        ]);

        $permisos->descripcion = $request->descripcion;
        $permisos->dia_no_laboral = $request->dia_no_laboral;
        
        $permisos->save();

        return redirect()->route('admin-permisos')->with('success', 'Dia no laboral actualizado correctamente.');
    }



    public function allow(Request $request, Permiso $permisos): RedirectResponse
    {
        
        $permisos->estado = "aceptado";
        
        $permisos->save();

        return redirect()->route('admin-permisos')->with('success', 'Permiso aceptado correctamente.');
    }

    public function deny(Request $request, Permiso $permisos): RedirectResponse
    {
        
        $permisos->estado = "rechazado";
        
        $permisos->save();

        return redirect()->route('admin-permisos')->with('success', 'Permiso rechazado correctamente.');
    }
}
