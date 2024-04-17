<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cour;
use App\Models\Instructeur;
use Illuminate\Http\Request;

class CoursCatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
      public function index()
     {
       
        $cours=Cour::select('id','Titre','Description','Prix','category_id','instructeur_id')
        ->orderBy('id','desc')->paginate(3);  
     return view('cours.cours',compact('cours'));
    }
   
    public function coursCat($id,)
    {
    $categories=Category::findOrFail($id);
    $cours=Cour::where('category_id',$id)->paginate(3);
    
    $category=Category::findOrFail($id);
    $instructeur=Instructeur::findOrFail($id);
    return view('cours.courscategory',compact('categories','cours','instructeur','category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
   public function show($id,$c_id){

    $cour=Cour::findOrFail($c_id);
            
   // $cour=Cour::where('id',$c_id)->get();
    $category=Category::findOrFail($id);
    $instructeur=Instructeur::findOrFail($id);
    return view('cours.show',compact('cour','category','instructeur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
