<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    public function enroll(Request $request){

        $data=$request->validate([
        'name'=>['required','max:40','min:3'],
        'email'=>['required','email'],
        'specialite'=>'nullable',
        'cour_id'=>['required','exists:cours,id']
        ]);
      $old_student=Student::select('id')->where('email',$data['email'])->first();
      if( $old_student==null){
        $student=Student::create([
         'name'=>$request->get('name'),
         'email'=>$request->get('email'),
         'specialite'=>$request->get('specialite')

        ]);
        $student_id=$student->id;
       
    }else{
      $student_id=$old_student->id;
      if($data['name']!==null && $data['specialite']!==null){
        $old_student->update(['name'=>$data['name'],'specialite'=>$data['specialite']]);
      }
    }
      
        DB::table('cour_student')->insert([
         'cour_id'=>$request->get('cour_id'),
         'student_id'=>$student_id,
         
        ]);
        return redirect('/')->with('mssg','student enrolled successufly');
    

    }
    
}
