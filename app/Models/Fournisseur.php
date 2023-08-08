<?php

namespace App\Models;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fournisseur extends Model
{
    use HasFactory;
    protected $fillable = ['nom_societe',  'adresse', 'numero_telephone', 'adresse_email'];

    
    public function produit()
    {
        return $this->hasMany(Produit::class, 'fournisseur_id');
    }
}
