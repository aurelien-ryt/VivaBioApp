<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function vueRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nom'      => 'bail|required|between:5,30|alpha',
            'prenom'   => 'bail|required|between:5,30|alpha',
            'email'    => 'bail|required|email|unique:users,email',
            'password' => 'bail|required|min:8|confirmed',
        ]);

        User::create([
            'nom'      => $request->nom,
            'prenom'   => $request->prenom,
            'email'    => $request->email,
            'password' => $request->password,
        ]);

        return redirect()->route('users.login')->with('success', 'Compte créé avec succès ! Connectez-vous.');
    }

    public function vueLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();

            return match(Auth::user()->role) {
                'gestionnaire' => redirect()->route('gestionnaire.dashboard'),
                default        => redirect()->route('catalogue.show'),
            };
        }

        return back()->withErrors([
            'email' => 'Identifiants incorrects.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('users.login');
    }
}
