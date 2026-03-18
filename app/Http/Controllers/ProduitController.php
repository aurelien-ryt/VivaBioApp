<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreProduitRequest;
use App\Http\Requests\UpdateProduitRequest;
use App\Models\Produit;

class ProduitController extends Controller
{
    
    public function index()
    {
    $produits = Produit::paginate(100);
    return view('dashboard', compact('produits'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    return view('produits.create');
}

    /**
     * quand on aura fini de créer le produit on le stockera avec cette fonction.
     */
    public function store(StoreProduitRequest $request)
    {
    Produit::create($request->validated());
    return redirect()->route('gestionnaire.dashboard')->with('success', 'Produit créé');
}

    /**
     * TODO: rendre l'acces a un article simplement en cliquant sur le titre (donc avec a href).
     */
    public function show(Produit $produit)
    {
        return view('clt.Produit', compact('produit'));
    }

    /**
     * On affiche une fiche produit, elle peux etre modifier mais c'est pas ce qu'on fera dans cette fonction
     */
    public function edit(Produit $produit)
    {
    return view('produits.edit', compact('produit'));
}

    /**
     * On modifie des données d'une fiche produit puis on redirige vers le dashboard
     */
    public function update(UpdateProduitRequest $request, Produit $produit)
    {
    $produit->update($request->validated());
    return redirect()->route('gestionnaire.dashboard')->with('success', 'Produit mis à jour');
}

    /**
     * On supprime l'article.
     */
    public function destroy(Produit $produit)
    {
    $produit->delete();
    return redirect()->route('gestionnaire.dashboard')->with('success', 'Produit supprimé');
}
}