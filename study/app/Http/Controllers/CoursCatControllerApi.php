<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cour;
use App\Models\Instructeur;
use Illuminate\Http\Request;

class CoursCatControllerApi extends Controller
{

    public function index()
    {

        $cours = Cour::select('id', 'Titre', 'Description', 'Prix', 'category_id', 'instructeur_id')
            ->orderBy('id', 'desc')->paginate(3);
            return response()->json(['cours'=>$cours]);
        
    }

    public function coursCat($id,)
    {
        $categories = Category::findOrFail($id);
        $cours = Cour::where('category_id', $id)->paginate(3);

        $category = Category::findOrFail($id);
        $instructeur = Instructeur::findOrFail($id);
        return response()->json(['cours'=>$cours,'categories'=>$categories,'instructeur'=>$instructeur,'category'=>$category]);
       
    }



    public function show($id, $c_id)
    {
        $cour = Cour::findOrFail($c_id);
        // $cour=Cour::where('id',$c_id)->get();
        $category = Category::findOrFail($id);
        $instructeur = Instructeur::findOrFail($id);
        return response()->json(['cour'=>$cour,'category'=>$category,'instructeur'=>$instructeur]);
        
    }
}
