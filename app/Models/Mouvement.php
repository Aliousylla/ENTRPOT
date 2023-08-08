<?php

namespace App\Models;

use App\Models\Produit;
use App\Models\Entrepot;
use App\Models\Operation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mouvement extends Model
{
    use HasFactory;
    protected $fillable = ['entrepot_id', 'produit_id', 'quantite_vendu' ,'prix_vente','operation_id'];

    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }

    // Relation "belongsTo" avec le modèle Entrepot
    public function entrepot()
{
    return $this->belongsTo(Entrepot::class);
}

    // Relation "belongsTo" avec le modèle Operation
    
    public function operation()
    {
        return $this->belongsTo(Operation::class);
    }
}
