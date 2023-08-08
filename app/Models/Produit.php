<?php

namespace App\Models;

use App\Models\Categorie;
use App\Models\Mouvement;
use App\Models\Fournisseur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = ['libelle', 'description','prix_unitaire','quantite_en_stock','categorie_id','fournisseur_id'];
  
    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }
    
    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class, 'fournisseur_id');
    }
    public function mouvement()
    {
        return $this->belongsTo(Mouvement::class);
    }
}
