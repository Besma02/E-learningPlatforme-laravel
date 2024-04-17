<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Commentaire;
use App\Models\Cour;
use App\Models\Instructeur;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Exists;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    
    {
       
            $cours=Cour::select('id','Titre','Description','Prix','category_id','instructeur_id')
        ->orderBy('id','desc')->paginate(3);
        
     
       
        $coursCount=Cour::count();
        $studentsCount=Student::count();
        $instructeurCount=Instructeur::count();
        $commentaires=Commentaire::select('id','auteur','Commentaire','cour_id','Métier')->get();
              return view('index',compact('cours','coursCount','studentsCount','instructeurCount','commentaires'));
    }
   
 


    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('FrontStudent.commentaires.create');
    }

    /**
     * Store a newly created resource in storage.
     */
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
        
      
        return redirect('/')->with('mssg','Commentaire added successfuly');
    
    }

    /**
     * Display the specified resource.
     */
    
        public function show($id,$c_id){
           $category=Category::find($id);
           $cour=Cour::findOrFail($c_id);
           
            $instructeur=Cour::findOrFail($id);
           

            return view('cours.show',compact('category','cour','instructeur'));

        }
      

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $commentaire=Commentaire::findOrFail($id);
         return view('FrontStudent.commentaires.edit',compact('commentaire'));
    }

    /**
     * Update the specified resource in storage.
     */
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
      
        return redirect('/')->with('mssg','Commentaire updated successfuly');
       
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $commentaire=Commentaire::findOrFail($id);
        $commentaire->delete();
       return back()->with('mssg','Commentaire deleted successfly');
    }
}
