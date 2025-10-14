<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GestionnaireStockController extends Controller
{
    public function catalogue($num)
    {
        return "vue catalogue de $num";
    }

    public function produit($num, $id)
    {
        return "En tant que $num, je consulte le produit $id";
    }

    public function consulterStock($num)
    {
        return "Consulter les stocks (gestionnaire $num)";
    }

    public function gererProduits($num)
    {
        return "$num modifie le produit";
    }

    public function definirSeuil($num, $id)
    {
        return "Définir un seuil pour le produit $id (gestionnaire $num)";
    }
}
