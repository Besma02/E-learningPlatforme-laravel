<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{  
    protected $fillable=[
        'id',
        'auteur',
        'Métier',
        'Commentaire',
        'cour_id'
        
    ];
    public function cours()
    {
        return $this->belongsTo(Cour::class);
    }
}
