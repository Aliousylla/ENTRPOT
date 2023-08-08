<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Entrepot;
use App\Models\Mouvement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Fournisseur;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories =Categorie::all();
        $fournisseurs =Fournisseur::all();
        $entrepots = Entrepot::all();
        $produits=Produit::all();
        $mouvements=Mouvement::all();
        return view('produits.index',compact(['produits','mouvements','entrepots','fournisseurs','categories']));


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
        //
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'libelle' => 'required',
            'description' => 'required',
            'prix_unitaire' => 'required',
            'quantite_en_stock' => 'required',
            'fournisseur_id' => 'required',
            'categorie_id' => 'required',
            
        ]);

        // Créer un nouveau médicament
        $produit = produit::create($validatedData);

        // Rediriger vers la liste des médicaments avec un message de succès
        return redirect()->route('produits.index')->with('success', 'Le produit a été créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    
    public function searchProduitAutocomplete(Request $request)
{
    $term = $request->input('term');
    $medicaments = Produit::where('nom', 'LIKE', '%' . $term . '%')
                             ->select('libelle', 'prix_unitaire','quantite_en_stock','categorie','id')
                             ->get();
    return response()->json($medicaments);
}
}
