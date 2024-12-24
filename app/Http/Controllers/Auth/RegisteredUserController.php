<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'email' => 'required|string|email|max:255|unique:users',
            'number_phone' => 'required|string|max:15|regex:/^[0-9+()-]*$/'
        ]);
    
        $user = User::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'number_phone' => $request->number_phone            
        ]);
    
        event(new Registered($user));
    
        Auth::login($user);
    
        return redirect()->route('create-reservation');
    }
}
