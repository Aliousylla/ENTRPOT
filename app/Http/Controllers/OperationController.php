<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Entrepot;
use App\Models\Fournisseur;
use App\Models\Mouvement;
use App\Models\Operation;
use App\Models\Produit;
use App\Models\Type_Operation;
use Illuminate\Http\Request;

class OperationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $operations =Operation::all();
        return view('operations.index', compact("operations"));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $typeoperations=Type_Operation::all();
        $categories =Categorie::all();
        $fournisseurs =Fournisseur::all();
        $entrepots = Entrepot::all();
        $produits=Produit::all();
        $mouvements=Mouvement::all();


        return view('operations.create',compact("typeoperations",'produits','entrepots'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'libelle' => 'required',
            'info' => 'required',
            'type__operation_id' => 'required',
            
        ]);
        $operations = Operation::create([
            'date_operation' => now(),
            'libelle' => $request->input('libelle'),
            'info' => $request->input('info'),
            'type__operation_id' => $request->input('type__operation_id'),
        ]);  
        $produits=Produit::all(); 
        $entrepots =Entrepot::all();
        $operations->load('typeoperation');
        return view('mouvements.create', ['id' => $operations->id,'operations' => $operations->typeoperation->libelle,'entrepots' =>$entrepots, 'produits'=>$produits]);}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $entrepots =Entrepot::all();
        $produits =Produit::all();
        
        $operations = Operation::findOrFail($id);
        $mouvements = Mouvement::where('operation_id',$id)->get();
        
        return view('operations.show', compact('operations','mouvements','produits','entrepots'));
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
