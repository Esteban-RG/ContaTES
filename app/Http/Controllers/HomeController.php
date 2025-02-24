<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;


class HomeController extends Controller
{
    public function show(Request $request): View
    {
        $user = User::with(['persona.empleado.plaza'])->findOrFail($request->user()->id);

        return view('home', compact("user"));
    }
}
