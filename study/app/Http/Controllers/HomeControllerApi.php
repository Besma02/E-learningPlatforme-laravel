<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Commentaire;
use App\Models\Cour;
use App\Models\Instructeur;
use App\Models\Student;
use Illuminate\Http\Request;

class HomeControllerApi extends Controller
{
    public function index()
    
    {
         $cours=Cour::select('id','Titre','Description','Prix','category_id','instructeur_id')
        ->orderBy('id','desc')->paginate(3);
      
        $commentaires=Commentaire::select('id','auteur','Commentaire','cour_id','Métier')->get();
        return response()->json(['cours'=>$cours,
        'commentaires'=>$commentaires]);
    }
 

    public function store(Request $request)
    {    
        
        $data=$request->validate([
            'auteur'=>['required','max:40'],
            'Métier'=>['required','max:40'],
            'Commentaire'=>['required','max:500'],
            'cour_id'=>['required','exists:cours,id']
            

        ]);    
         
        Commentaire::create([
            'auteur'=>$request->get('auteur'),
            'Métier'=>$request->get('Métier'),
            'Commentaire'=>$request->get('Commentaire'),
            'cour_id'=>$data['cour_id'],
        ]);
        
      
        return response()->json(['mssg'=>'Commentaire added successfuly']);
    
    }

   
    public function update(Request $request,$id)
    {

        $commentaire=Commentaire::findOrFail($id);
       
        $data=$request->validate([
            'auteur'=>['required','max:40'],
            'Métier'=>['required','max:40'],
            'Commentaire'=>['required','max:500'],
            'cour_id'=>['required','exists:cours,id']
        
        ]);
        $commentaire->update([
            'auteur'=>$request->get('auteur'),
            'Métier'=>$request->get('Métier'),
            'Commentaire'=>$request->get('Commentaire'),
            'cour_id'=>$data['cour_id'],
        ]);
      
        return response()->json(['mssg'=>'Commentaire updated successfuly']);
       
        
    }

   
    public function destroy($id)
    {
        $commentaire=Commentaire::findOrFail($id);
        $commentaire->delete();
        return response()->json(['mssg'=>'Commentaire deleted successfuly']);
    }
}
