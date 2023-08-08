<?php

namespace App\Http\Controllers;

use App\Models\Type_Operation;
use Illuminate\Http\Request;
use App\Http\Controllers\OperationController;

class Type_OperationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $typeoperations = Type_Operation::all();
        return view('typeoperations.index', compact('typeoperations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('typeoperations.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'libelle' => 'required',
            'flux' => 'required',
        ]);

        // Créer un nouveau typeoperation
        $typeoperation = Type_Operation ::create($validatedData);

        // Rediriger vers la liste des typeoperations avec un message de succès
        return redirect()->route('typeoperations.index')->with('success', 'Le type operation a été créé avec succès.');
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
