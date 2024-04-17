<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructeur extends Model
{
    protected $fillable=[
        'name',
        'prenom'
    ];
    public function cours()
    {
        return $this->hasMany(Cour::class);
    }
}
