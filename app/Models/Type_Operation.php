<?php

namespace App\Models;

use App\Models\Operation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Type_Operation extends Model
{
    use HasFactory;
    protected $fillable = ['flux', 'libelle'];

    public function operations()
    {
        return $this->hasMany(Operation::class);
    }
}
