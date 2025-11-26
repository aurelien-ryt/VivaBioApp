<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fournisseur ;


class FournisseurController extends Controller
{
	public function consulter(){
		
		$fournisseurs = Fournisseur::all() ;
		
		return view( 'liste_fournisseurs') -> with('fournisseurs',$fournisseurs) ;
	}
}
