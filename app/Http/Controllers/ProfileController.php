<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use PragmaRX\Google2FALaravel\Support\Authenticator;
use PragmaRX\Google2FAQRCode\Google2FA;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        // Obtener usuario con relaciones
        $user = User::with(['persona.empleado.plaza'])->findOrFail($request->user()->id);

        $qrCodeUrl = null;
        $secret = null;

        // Generar QR solo si 2FA no está habilitado
        if (!$user->google2fa_enabled) {
            $google2fa = new Google2FA();

            if (empty($user->google2fa_secret)) {
                $user->google2fa_secret = $google2fa->generateSecretKey();
                $user->save();
            }

            $qrCodeUrl = $google2fa->getQRCodeUrl(
                config('app.name'),
                $user->email,
                $user->google2fa_secret
            );
            
            $secret = $user->google2fa_secret;
        }

        return view('profile.edit', [
            'user' => $user,
            'qrCodeUrl' => $qrCodeUrl,
            'secret' => $secret,
        ]);
    }

    // Habilitar 2FA
    public function enable2fa(Request $request)
    {
        $request->validate([
            'one_time_password' => 'required',
        ]);

        $user = $request->user();
        $authenticator = app(Authenticator::class)->boot($request);

        // Verificar el código OTP
        if ($authenticator->verifyGoogle2FA($user->google2fa_secret, $request->one_time_password)) {
            $user->google2fa_enabled = true;
            $user->save();

            return redirect()->route('profile.edit')->with('success', '2FA has been enabled.');
        }

        return back()->withErrors(['one_time_password' => 'Invalid one time password.']);
    }

    // Deshabilitar 2FA
    public function disable2fa(Request $request)
    {
        $user = $request->user();
        $user->google2fa_secret = null;
        $user->google2fa_enabled = false;
        $user->save();

        return redirect()->route('profile.edit')->with('success', '2FA has been disabled.');
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
