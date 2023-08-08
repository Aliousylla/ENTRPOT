<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $fournisseurs = Fournisseur::all();
        return view('fournisseurs.index', compact('fournisseurs'));
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
        {
            // Valider les données du formulaire
            $validatedData = $request->validate([
                'nom_societe' => 'required',
                'adresse' => 'required',
                'numero_telephone' => 'required',
                'adresse_email' => 'required|email',
            ]);
    
            // Créer un nouveau fournisseur
            $fournisseur = Fournisseur::create($validatedData);
    
            // Rediriger vers la liste des fournisseurs avec un message de succès
            return redirect()->route('fournisseurs.index')->with('success', 'Le fournisseur a été créé avec succès.');
        }
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
}
