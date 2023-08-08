<?php

namespace App\Http\Controllers;

use App\Models\Entrepot;
use App\Models\Mouvement;
use App\Models\Operation;
use App\Models\Produit;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class MouvementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $mouvements = Mouvement::all();
       
            return view('mouvements.index', compact('mouvements'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $operations=Operation::all();
        $produits=Produit::all();
        $entrepots=Entrepot::all();
        return view('mouvements.create',compact('operations','entrepots',''));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{

    // dd($request->all());
   
    
        // $validatedData = $request->validate([
        //     'operation_id.*' => 'required',
        //     'produit_id.*' => 'required',
        //     'quantite_en_stock.*' => 'required',
        //     'entrepot_id.*'=>'required',
        //     'prix_unitaire.*'=>'required',
            
        // ]);
        
        dd($request->all());
          
        for ($i = 0; $i < count($request->libelle); $i++) {
            $mouvement = Mouvement::create([
                'entrepot_id' => $request->entrepot_id[$i], 
                'prix_unitaire'=>$request->prix_unitaire[$i],        
                'produit_id' => $request->produit_id[$i], 
                'quantite_en_stock' => $request->quantite_en_stock[$i],
                'operation_id' => $request->operation_id[$i],
               
                
            ]);
            
    $operation = $mouvement->operation;
    $typeOperation = $operation->typeOperation;
    if ($typeOperation->flux === 'Sortie') {
        Produit::find($request->produit_id[$i])->decrement('quantite_en_stock', $request->quantite_en_stock[$i]);
    } else {
        Produit::find($request->produit_id[$i])->increment('quantite_en_stock', $request->quantite_en_stock[$i]);
    } 
        }  
        $operations = Operation::all();
        // return view('operations.index', compact('operations'));  
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
    public function searchproduitAutocomplete(Request $request)
    {
        $term = $request->input('term');
        $produits = Produit::where('libelle', 'LIKE', '%' . $term . '%')
                                 ->select('libelle', 'prix_unitaire','quantite_en_stock','description','id')
                                 ->get();
        return response()->json($produits);
}




}