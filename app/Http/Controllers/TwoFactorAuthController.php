<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PragmaRX\Google2FALaravel\Support\Authenticator;

class TwoFactorAuthController extends Controller
{
    public function show2faForm()
    {
        return view('auth.2fa');
    }

    public function verify2fa(Request $request)
    {
        $request->validate([
            'one_time_password' => 'required',
        ]);

        $user = $request->user();

        $authenticator = app(Authenticator::class)->boot($request);

        if ($authenticator->verifyGoogle2FA($user->google2fa_secret, $request->one_time_password)) {
            $authenticator->login();
            return redirect()->intended('/home');
        }

        return back()->withErrors(['one_time_password' => 'Invalid one time password.']);
    }
}