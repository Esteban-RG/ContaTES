<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;




class AdminUsers extends Controller
{
    public function show(): View
    {
        $users = User::all();

        return view('admin.user', compact('users'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        event(new Registered($user));


        return redirect()->route('admin-user')->with('success', 'Usuario creado correctamente.');
    }

    public function destroy(User $user) : RedirectResponse 
    {

        $user->delete();

        return redirect()->route('admin-user')->with('success', 'Usuario eliminado correctamente.'); 
        
    }

    public function edit(User $user): View
    {
        return view('admin.edit-user', compact('user'));
    }

    public function update(Request $request, User $user): RedirectResponse
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email,' . $user->id],
        'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
        'role' => ['required', 'string', 'in:admin,user,editor'], // Validar el campo 'role'
    ]);

    $user->name = $request->name;
    $user->email = $request->email;
    $user->role = $request->role;

    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    $user->save();

    return redirect()->route('admin-user')->with('success', 'Usuario actualizado correctamente.');
}
}
