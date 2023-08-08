<?php

namespace App\Models;

use App\Models\Mouvement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Entrepot extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle',
        'adresse', 'type'
        ];
        public function mouvements()
{
    return $this->hasMany(Mouvement::class);
}
}
