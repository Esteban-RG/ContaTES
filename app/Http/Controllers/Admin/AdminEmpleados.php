<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Empleado;
use App\Models\User;
use App\Models\Plaza;
use App\Models\Persona;
use Illuminate\Http\RedirectResponse;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;




class AdminEmpleados extends Controller
{
    public function show(): View
    {
        $empleados =  Empleado::with(['persona','plaza'])->get();
        $users = User::whereDoesntHave('persona.empleado')->get();
        $plazas = Plaza::all();

        return view('admin.empleado', compact(['empleados','users','plazas']));
    }

    public function store(Request $request): RedirectResponse
    {
        
        $request->validate([
            'user_id' => ['required', 'integer', 'exists:users,id'], 
            'plaza_id' => ['required', 'integer', 'exists:plazas,id'], 
            'matricula' => ['required', 'integer', 'unique:empleados,matricula'],
            'fecha_ingreso' => ['required', 'date'],
        ]);

        
        $persona = Persona::firstOrCreate([
            'user_id' => $request->user_id,
        ]);

        
        $empleado = Empleado::create([
            'persona_id' => $persona->id, 
            'plaza_id' => $request->plaza_id,
            'matricula' => $request->matricula,
            'fecha_ingreso' => $request->fecha_ingreso,
        ]);

       
        return redirect()->route('admin-empleado')->with('success', 'Empleado creado correctamente.');
    }

    public function destroy(Empleado $empleado) : RedirectResponse 
    {

        $empleado->delete();

        return redirect()->route('admin-empleado')->with('success', 'Empleado eliminado correctamente.'); 
        
    }

    public function edit(Empleado $empleado): View
    {
        $users = User::all();
        $plazas = Plaza::all();
        return view('admin.edit-empleado', compact(['empleado', 'users', 'plazas']));
    }

    public function details(Empleado $empleado): View
    {
        return view('admin.details-empleado', compact('empleado'));
    }



    public function update(Request $request, Empleado $empleado): RedirectResponse
    {
        // Validar los datos del formulario
        $request->validate([
            'plaza_id' => ['required', 'integer', 'exists:plazas,id'], 
            'matricula' => ['required', 'integer', 'unique:empleados,matricula,' . $empleado->id],
            'fecha_ingreso' => ['required', 'date'],
        ]);

        // Actualizar los campos del empleado
        $empleado->plaza_id = $request->plaza_id;
        $empleado->matricula = $request->matricula;
        $empleado->fecha_ingreso = $request->fecha_ingreso;

        // Guardar los cambios en la base de datos
        $empleado->save();

        // Redireccionar con un mensaje de éxito
        return redirect()->route('admin-empleado')->with('success', 'Empleado actualizado correctamente.');

    
    }
}
