<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function catalogue()
    {
        return view ("clt.Catalogue");
    }

    public function produit($num, $id)
    {
        return "En tant que $num, je consulte le produit $id";
    }

    public function ajouterAuPanier($num, $id)
    {
        return "$num ajoute au panier l'article $id";
    }

    public function consulterCommande($num, $id)
    {
        return "Consulter ma commande";
    }

    public function annulerCommande($num, $id)
    {
        return "Je suis $num et j'annule ma commande $id";
    }

    public function payerCommande($num)
    {
        return "Payer la commande";
    }
}
