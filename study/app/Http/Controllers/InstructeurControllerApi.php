<?php

namespace App\Http\Controllers;

use App\Models\Instructeur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InstructeurControllerApi extends Controller
{
    
    public function index(){
        $instructeurs=Instructeur::all();
        return response()->json(['instructeurs'=>$instructeurs]);
    }
   
    public function store(Request $request){
        $validator=Validator::make($request->all(),[
            'name'=>['required','max:40'],
            'prenom'=>['required','max:40'],
            
        ]);
        if($validator->fails()){
        return back()->withErrors( $validator);
        }else{
                  
        Instructeur::create([
            'name'=>$request->get('name'),
            'prenom'=>$request->get('prenom'),
        ]);
        }
      
        return response()->json(['mssg'=>'Instructeur added successfuly']);
  
}

public function update(Request $request,$id){
        $instructeur=Instructeur::findOrFail($id);
        $validator=Validator::make($request->all(),[
            'name'=>['required','max:40'],
            'prenom'=>['required','max:40'],
            

        ]);
      
             if($validator->fails()){
            return back()->withErrors( $validator);
        }else{
       
        $instructeur->update([
            'name'=>$request->get('name'),
            'prenom'=>$request->get('prenom'),
            
        ]);
        return response()->json(['mssg'=>'Instructeur updated successfuly']);
    }       
}
public function destroy($id)
    {
        $instructeur=Instructeur::find($id);
        $instructeur->delete();
        return response()->json(['mssg'=>'Instructeur deleted successfuly']);
    }
}
