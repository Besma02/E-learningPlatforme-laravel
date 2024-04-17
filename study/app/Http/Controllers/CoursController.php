<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cour;
use App\Models\Instructeur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Exists;

class CoursController extends Controller
{
    public function index(){
        $cours=Cour::select('id','Titre','Description','Prix')
        ->orderBy('id','desc')->get();
        return view('admin.cours.index',compact('cours'));
    }
    public function create(){
        $categories=Category::select('id','name')->get();
        $instructeurs=Instructeur::select('id','name')->get();
    
        return view('admin.cours.create',compact('categories','instructeurs'));
    }
    public function store(Request $request){
        $validator=Validator::make($request->all(),[
            'Titre'=>['required','max:200'],
            'Prix'=>['required','integer'],
            'Description'=>['required'],
            'category_id'=>['required','exists:categories,id'],
            'instructeur_id'=>['required','exists:instructeurs,id']
            

        ]);
        
        if($validator->fails()){
        return back()->withErrors( $validator);
        }else{
                  
        Cour::create([
            'Titre'=>$request->get('Titre'),
            'Prix'=>$request->get('Prix'),
            'Description'=>$request->get('Description'),
            'category_id'=>$request->get('category_id'),
            'instructeur_id'=>$request->get('instructeur_id')
        ]);
        
        }
        
      
       return redirect('/dashboard/cours')->with('mssg','cours added successfuly');
    
      
   
}
public function edit($id){
    $categories=Category::select('id','name')->get();
    $instructeurs=Instructeur::select('id','name')->get();
    $cour=cour::findOrFail($id);
    
    return view('admin.cours.edit',compact('cour','categories','instructeurs'));
}
public function update(Request $request,$id){
        $cour=Cour::findOrFail($id);
        $validator=Validator::make($request->all(),[
            'Titre'=>['required','max:40'],
            'Prix'=>['required','max:40'],
            'Description'=>['required'],
            'category_id'=>['required','exists:categories,id'],
            'instructeur_id'=>['required','exists:instructeurs,id']
           
            

        ]);
      
        
        if($validator->fails()){
            return back()->withErrors( $validator);
        }else{
       
        $cour->update([
            'Titre'=>$request->get('Titre'),
            'Prix'=>$request->get('Prix'),
            'Description'=>$request->get('Description'),
            'category_id'=>$request->get('category_id'),
            'instructeur_id'=>$request->get('instructeur_id')
            
        ]);
        return redirect('/dashboard/cours')->with('mssg','cour updated successfuly');
    }       
}
public function destroy($id)
    {
        $cour=Cour::findOrFail($id);
        $cour->delete();
        return redirect('/dashboard/cours')->with('mssg','cour deleted successfly');
    }
}
