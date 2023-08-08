<?php

namespace App\Http\Controllers;

use App\Models\Entrepot;
use Illuminate\Http\Request;

class EntrepotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $entrepots = Entrepot::all();
        return view('entrepots.index', compact('entrepots'));
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
        {    $validatedData = $request->validate([
            'libelle' => 'required',
            'adresse' => 'required',
            'type' => 'required',
        ]);

        // Créer un nouveau entrepot
        $entrepots = Entrepot::create($validatedData);

        // Rediriger vers la liste des entrepots avec un message de succès
        return redirect()->route('entrepots.index')->with('success', 'Le entrepot a été créé avec succès.');
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    
        
        
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
