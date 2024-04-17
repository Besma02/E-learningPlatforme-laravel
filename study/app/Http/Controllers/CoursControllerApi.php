<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cour;
use App\Models\Instructeur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CoursControllerApi extends Controller
{
    public function index(){
        $cours=Cour::select('id','Titre','Description','Prix')
        ->orderBy('id','desc')->get();
        return response()->json(['cours'=>$cours]);
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
        
        return response()->json(['mssg'=>'cours added successfuly']);
      
    
      
   
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
        return response()->json(['mssg'=>'cours updated successfuly']);
    }       
}
public function destroy($id)
    {
        $cour=Cour::findOrFail($id);
        $cour->delete();
        return response()->json(['mssg'=>'cours deleted successfuly']);
    }
}
