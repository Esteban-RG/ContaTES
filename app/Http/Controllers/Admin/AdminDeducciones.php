<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\OtraDeduccion;
use App\Models\ISR;
use Illuminate\Http\RedirectResponse;





class AdminDeducciones extends Controller
{
    public function show(): View
    {
        $deduccions = OtraDeduccion::all();
        $tarifas_isr = ISR::all();

        return view('admin.deduccion', compact(['deduccions','tarifas_isr']));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'descripcion' => ['required', 'string', 'max:100'],
            'tipo' => ['required', 'string', 'max:10'],
            'valor' => ['required', 'numeric', 'min:1'],
        ]);

        $deduccion = OtraDeduccion::create([
            'descripcion' => $request->descripcion,
            'tipo' => $request->tipo,
            'valor' => $request->valor,
        ]);


        return redirect()->route('admin-deduccion')->with('success', 'Deduccion creado correctamente.');
    }

    public function destroy(OtraDeduccion $deduccion) : RedirectResponse 
    {

        $deduccion->delete();

        return redirect()->route('admin-deduccion')->with('success', 'Deduccion eliminado correctamente.'); 
        
    }

    public function edit(OtraDeduccion $deduccion): View
    {
        return view('admin.edit-deduccion', compact('deduccion'));
    }

    public function update(Request $request, OtraDeduccion $deduccion): RedirectResponse
    {
        $request->validate([
            'descripcion' => ['required', 'string', 'max:100'],
            'tipo' => ['required', 'string', 'max:10'],
            'valor' => ['required', 'numeric', 'min:1'],
        ]);

        $deduccion->descripcion = $request->descripcion;
        $deduccion->tipo = $request->tipo;
        $deduccion->valor = $request->valor;
        
        $deduccion->save();

        return redirect()->route('admin-deduccion')->with('success', 'Deduccion actualizado correctamente.');
    }
}
