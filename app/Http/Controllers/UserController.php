<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function vueRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
       $request->validate([
            'nom' => 'bail|required|between:5,30|alpha',
            'prenom' => 'bail|required|between:5,30|alpha',
            'email' => 'bail|required|email',
            'password' => 'bail|required|min:8|confirmed',
        ]);*/

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
        //Session::flush();
        Session::forget('idUser');
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }

        return redirect('/login')->with('error', 'Invalid credentials. Please try again.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('users.login');
    }
}
