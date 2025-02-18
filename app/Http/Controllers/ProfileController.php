<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\PersonalUpdateRequest;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use PhpParser\Node\Stmt\ElseIf_;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = User::with(['persona.empleado.plaza'])->find($request->user()->id);

        if (!$user) {
            abort(404, 'Usuario no encontrado');
        }

        return view('profile.edit', compact('user'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $table = $request->input('table');

        if ($table == 'user') {

            $request->user()->fill($request->validated());

            if ($request->user()->isDirty('email')) {
                $request->user()->email_verified_at = null;
            }

            $request->user()->save();
        } elseif ($table == 'personal') {
            
            $persona = Persona::firstOrNew(['user_id' => $request->user()->id]);
            
            $validatedData = $request->validated();

            $persona->fill($validatedData);
            $persona->save();

        } elseif($table == 'laboral'){

            $empleado = $request->user()->persona->empleado;

            // Guardar archivos
            $this->guardarArchivos($request, $empleado);
            $empleado->save();



        }

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }


    private function guardarArchivos($request, $empleado): void
    {
        $campos = ['curp', 'rfc', 'nss'];

        foreach ($campos as $campo) {
            if ($request->hasFile($campo)) {
                $path = $request->file($campo)->store("pdfs/$campo", 'public');
                $empleado->$campo = $path;
            }
        }
    }
}
