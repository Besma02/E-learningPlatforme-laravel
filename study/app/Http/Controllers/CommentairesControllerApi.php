<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Cour;
use Illuminate\Http\Request;

class CommentairesControllerApi extends Controller
{
    public function index(){
        $commentaires=Commentaire::all();
        $cours=Cour::all();
        return response()->json(['commentaires'=>$commentaires]);
    }
    public function destroy($id){
    
        $commentaire=Commentaire::find($id);
        $commentaire->delete();
        return response()->json(['mssg'=>'commentaire deleted successfuly']);
    }
}
