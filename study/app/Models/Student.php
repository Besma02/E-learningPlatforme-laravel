<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{    
    protected $fillable=[
        'name',
        'email',
        'specialite'
    ];
    public function cours()
    {   

        return $this->belongsToMany(Cour::class)->withPivot('status');
    }
}
