<?php

namespace App\Http\Controllers;

use App\Models\Cour;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StudentsController extends Controller
{
     
    public function index(){
        $students=Student::all();
        return view('admin.students.index',compact('students'));
    }
    public function create(){
    
        return view('admin.students.create');
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
      
        return redirect('/dashboard/students')->with('mssg','student added successfuly');
    
      
   
}
public function edit($id){
    $student=Student::findOrFail($id);
    
    return view('admin.students.edit',compact('student'));
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
        return redirect('/dashboard/students')->with('mssg','student updated successfuly');
    }       
}
public function destroy($id)
    {
        $student=Student::find($id);
        $student->delete();
        return redirect('/dashboard/students')->with('mssg','student deleted successfly');
    }
public function showCours($id)
{
    $cours=Student::findOrFail($id)->cours;
    $student_id=$id;
   
   
    return view('admin.students.showCours',compact('cours','student_id'));
}
public function approveCour($id,$c_id)
{
    DB::table('cour_student')->where('student_id',$id)->where('cour_id',$c_id)->update([
       'status'=>'approve'
    ]);
    return back();
}
public function rejectCour($id,$c_id)
{
    DB::table('cour_student')->where('student_id',$id)->where('cour_id',$c_id)->update([
       'status'=>'reject'
    ]);
    return back();
}
public function addCour($id)
{
    $student_id=$id;
    $cours=Cour::select('id','Titre')->get();
    return view('admin.students.addCour',compact('student_id','cours'));
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
    return redirect('/dashboard')->with('mssg','cour addded successufly');
}
}
