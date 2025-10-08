<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployePolyvalentController extends Controller
{
    public function catalogue()
    {
        return view("ep.Catalogue");
    }

public function produit($num, $id)
 { return "En tant que $num, je consulte le produit $id"; }
   

    public function ficheProduit($num, $id)
    {
        return "Formulaire qui crée un nouvel article pour $num (produit $id)";
    }

    public function consulterCommande($num)
    {
        return "Consulter la commande";
    }

    public function consulterStock($num)
    {
        return "Consulter l'état des stocks pour l'employé $num";
    }

    public function retirerStock($num)
    {
        return "Retirer du stock pour une commande ($num)";
    }
}