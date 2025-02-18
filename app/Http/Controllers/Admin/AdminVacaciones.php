<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Vacaciones;
use Illuminate\Http\RedirectResponse;





class AdminVacaciones extends Controller
{
    public function show(): View
    {
        $vacaciones = Vacaciones::all();

        return view('admin.vacaciones', compact('vacaciones'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'dia_no_laboral' => ['required', 'date','unique:vacaciones,dia_no_laboral'],
            'descripcion' => ['required', 'string', 'max:255'],
        ]);


        $vacaciones = Vacaciones::create([
            'dia_no_laboral' => $request->dia_no_laboral,
            'descripcion' => $request->descripcion,
        ]);


        return redirect()->route('admin-vacaciones')->with('success', 'Dia no laboral creado correctamente.');
    }

    public function destroy(Vacaciones $vacaciones) : RedirectResponse 
    {

        $vacaciones->delete();

        return redirect()->route('admin-vacaciones')->with('success', 'Dia no laboral eliminado correctamente.'); 
        
    }

    public function edit(Vacaciones $vacaciones): View
    {
        return view('admin.edit-vacaciones', compact('vacaciones'));
    }

    public function update(Request $request, Vacaciones $vacaciones): RedirectResponse
    {
        $request->validate([
            'dia_no_laboral' => ['required', 'date'],
            'descripcion' => ['required', 'string', 'max:255'],
        ]);

        $vacaciones->descripcion = $request->descripcion;
        $vacaciones->dia_no_laboral = $request->dia_no_laboral;
        
        $vacaciones->save();

        return redirect()->route('admin-vacaciones')->with('success', 'Dia no laboral actualizado correctamente.');
    }
}
