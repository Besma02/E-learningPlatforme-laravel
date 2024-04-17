<?php

namespace App\Http\Controllers;

use App\Models\Instructeur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InstructeurController extends Controller
{
    
    public function index(){
        $instructeurs=Instructeur::all();
        return view('admin.instr.index',compact('instructeurs'));
    }
    public function create(){
    
        return view('admin.instr.create');
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
      
        return redirect('/dashboard/instructeurs')->with('mssg','Instructeur added successfuly');
    
      
   
}
public function edit($id){
    $instructeur=Instructeur::findOrFail($id);
    
    return view('admin.instr.edit',compact('instructeur'));
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
        return redirect('/dashboard/instructeurs')->with('mssg','Instructeur updated successfuly');
    }       
}
public function destroy($id)
    {
        $instructeur=Instructeur::find($id);
        $instructeur->delete();
        return redirect('/dashboard/instructeurs')->with('mssg','Instructeur deleted successfly');
    }
}
