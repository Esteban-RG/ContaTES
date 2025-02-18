<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Empleado;
use App\Models\User;
use App\Models\Plaza;
use App\Models\Persona;
use App\Models\Bono;
use Illuminate\Http\RedirectResponse;



class BonoEmpleadoController extends Controller
{
     // Obtener los roles de un usuario
     public function getBonos($empleado)
     {
         $user = User::with('roles')->findOrFail($empleado->id);
         return response()->json($user->roles);
     }
 
    public function assignBono(Request $request, Empleado $empleado) :  RedirectResponse
    {
        $empleado->bonos()->attach($request->bono_id);
        
        return redirect()->route('admin-empleado-details',$empleado)->with('success', 'Bono agregado correctamente.');
         
    }
 
     // Eliminar un rol de un usuario
     public function removeBono(Empleado $empleado, Bono $bono) : RedirectResponse
     {
         $empleado->bonos()->detach($bono->id);
 
         return redirect()->route('admin-empleado-details',$empleado)->with('success', 'Bono agregado correctamente.');
    }
}
