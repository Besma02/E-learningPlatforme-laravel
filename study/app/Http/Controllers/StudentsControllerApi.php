<?php

namespace App\Http\Controllers;

use App\Models\Cour;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StudentsControllerApi extends Controller
{
    public function index(){
        $students=Student::all();
        return response()->json(['students'=>$students]);
    }
   
    public function store(Request $request){
        $validator=Validator::make($request->all(),[
            'name'=>['required','max:40'],
            'email'=>['required','email','unique:students'],
            'specialite'=>['required','max:50'],
            

        ]);
        if($validator->fails()){
        return back()->withErrors( $validator);
        }else{
                  
        student::create([
            'name'=>$request->get('name'),
            'email'=>$request->get('email'),
            'specialite'=>$request->get('specialite'),
        ]);
        }
      
        return response()->json(['mssg'=>'student added successfuly']);
    
      
   
}

public function update(Request $request,$id){
        $student=Student::findOrFail($id);
        $validator=Validator::make($request->all(),[
            'name'=>['required','max:40'],
            'email'=>['required','email'],
            'specialite'=>['required','max:50'],
            

        ]);
      
        
        if($validator->fails()){
            return back()->withErrors( $validator);
        }else{
       
        $student->update([
            'name'=>$request->get('name'),
            'email'=>$request->get('email'),
            'specialite'=>$request->get('specialite'),
            
        ]);
        return response()->json(['mssg'=>'student updated successfuly']);
    }       
}
public function destroy($id)
    {
        $student=Student::find($id);
        $student->delete();
        return response()->json(['mssg'=>'student deleted successfuly']);
    }
public function showCours($id)
{
    $cours=Student::findOrFail($id)->cours;
    $student_id=$id;
    return response()->json(['cours'=>$cours,'student_id'=>$id]);
   
    
}
public function approveCour($id,$c_id)
{
    DB::table('cour_student')->where('student_id',$id)->where('cour_id',$c_id)->update([
       'status'=>'approve'
    ]);
    return response()->json(['mssg'=>'cour_student accepted successfuly']);
}
public function rejectCour($id,$c_id)
{
    DB::table('cour_student')->where('student_id',$id)->where('cour_id',$c_id)->update([
       'status'=>'reject'
    ]);
    return response()->json(['mssg'=>'cour_student refused ']);
}

public function storeCour($id,Request $request)
{
   $data=$request->validate([
    'cour_id'=>['required','exists:cours,id']
   ]);
   DB::table('cour_student')->insert([
      'student_id'=>$id,
      'cour_id'=>$data['cour_id']
    ]);
    return response()->json(['mssg'=>'cour addded successufly']);
   
}
}
