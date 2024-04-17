<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cour;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function index()
    
    {
        $search=request()->query('search');
        if($search){
            $cours=Cour::where('Titre','LIKE',"%{$search}%")->paginate(3);
        }else{
            $cours=Cour::select('id','Titre','Description','Prix','category_id','instructeur_id')
        ->orderBy('id','desc')->paginate(3);
        }
     
           
        return view('search',compact('cours'));
    }
   
   
}
