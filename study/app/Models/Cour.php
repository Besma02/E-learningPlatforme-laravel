<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cour extends Model

{
protected $fillable=[
'id',
'Titre',
'Description',
'Durée_du_cours',
'Niveau_de_difficulté',
'Nombre_de_lecons',
'Nombre_de_quizz',
'Prix',
'Nombre_etudiants_acceptee',
'category_id',
'instructeur_id'

];
    public function Categories()
    {
        return $this->belongsTo(Category::class);
    }
    public function instructeurs()
    {
        return $this->belongsTo(Instructeur::class);
    }
    public function students()
    {   

        return $this->belongsToMany(Student::class);
    }
   
}
