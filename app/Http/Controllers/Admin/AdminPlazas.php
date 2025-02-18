<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Plaza;
use Illuminate\Http\RedirectResponse;





class AdminPlazas extends Controller
{
    public function show(): View
    {
        $plazas = Plaza::all();

        return view('admin.plaza', compact('plazas'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'sueldo' => ['required', 'numeric', 'min:1'],
        ]);

        $plaza = Plaza::create([
            'nombre' => $request->nombre,
            'sueldo' => $request->sueldo,
        ]);


        return redirect()->route('admin-plaza')->with('success', 'Plaza creado correctamente.');
    }

    public function destroy(Plaza $plaza) : RedirectResponse 
    {

        $plaza->delete();

        return redirect()->route('admin-plaza')->with('success', 'Plaza eliminada correctamente.'); 
        
    }

    public function edit(Plaza $plaza): View
    {
        return view('admin.edit-plaza', compact('plaza'));
    }

    public function update(Request $request, Plaza $plaza): RedirectResponse
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'sueldo' => ['required', 'numeric', 'min:1'],
        ]);

        $plaza->nombre = $request->nombre;
        $plaza->sueldo = $request->sueldo;
        
        $plaza->save();

        return redirect()->route('admin-plaza')->with('success', 'Plaza actualizada correctamente.');
    }
}
