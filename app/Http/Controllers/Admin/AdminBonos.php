<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Bono;
use Illuminate\Http\RedirectResponse;





class AdminBonos extends Controller
{
    public function show(): View
    {
        $bonos = Bono::all();

        return view('admin.bono', compact('bonos'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'descripcion' => ['required', 'string', 'max:255'],
            'monto' => ['required', 'numeric', 'min:1'],
        ]);

        $bono = Bono::create([
            'descripcion' => $request->descripcion,
            'monto' => $request->monto,
        ]);


        return redirect()->route('admin-bono')->with('success', 'Bono creado correctamente.');
    }

    public function destroy(Bono $bono) : RedirectResponse 
    {

        $bono->delete();

        return redirect()->route('admin-bono')->with('success', 'Bono eliminado correctamente.'); 
        
    }

    public function edit(Bono $bono): View
    {
        return view('admin.edit-bono', compact('bono'));
    }

    public function update(Request $request, Bono $bono): RedirectResponse
    {
        $request->validate([
            'descripcion' => ['required', 'string', 'max:255'],
            'monto' => ['required', 'numeric', 'min:1'],
        ]);

        $bono->descripcion = $request->descripcion;
        $bono->monto = $request->monto;
        
        $bono->save();

        return redirect()->route('admin-bono')->with('success', 'Bono actualizado correctamente.');
    }
}
