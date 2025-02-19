<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\ISR;
use Illuminate\Http\RedirectResponse;





class AdminTarifas extends Controller
{
    

    public function edit(ISR $isr): View
    {
        return view('admin.edit-tarifa', compact('isr'));
    }

    public function update(Request $request, ISR $isr): RedirectResponse
    {
        $request->validate([
            'limite_inferior' => [ 'numeric'],
            'limite_superior' => [ 'numeric','nullable'],
            'cuota_fija' => [ 'numeric'],
            'porcentaje_aplicable' => [ 'numeric'],
        ]);

        $isr->limite_inferior = $request->limite_inferior;
        $isr->limite_superior = $request->limite_superior;
        $isr->cuota_fija = $request->cuota_fija;
        $isr->porcentaje_aplicable = $request->porcentaje_aplicable;
        
        $isr->save();

        return redirect()->route('admin-deduccion')->with('success', 'Tarifa actualizada correctamente.');
    }
}
