<?php

namespace App\Models;

use App\Models\Mouvement;
use App\Models\Type_Operation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Operation extends Model
{
    use HasFactory;
    protected $fillable = ['info', 'libelle','date_operation','type__operation_id'];
 
    public function typeoperation()
    {
        return $this->belongsTo(Type_Operation::class, 'type__operation_id');
    }

    public function mouvements()
    {
        return $this->hasMany(Mouvement::class);
    }
    
}
