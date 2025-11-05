<?php

namespace App\Http\Controllers;

use App\Http\Requests\Inscription;
use App\Http\Requests\InscriptionRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

 /*   public function vueLogin()
    {
        return view('login');
        
    }

        public function login()
    {
        return view('login');
        
    }
*/
    public function create()
    {
        return view('register');      
    }

    public function store(InscriptionRequest $request)
    {
        return view('registersuccess');
    }


   /* public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/ptest.php');
    }
    */
}

