<?php

namespace App\Models;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorie extends Model
{
    use HasFactory;
    protected $fillable = ['nom_categorie'];
    public function produit()
    {
        return $this->hasMany(Produit::class, 'categorie_id');
    }
}
