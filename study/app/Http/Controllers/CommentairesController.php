<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Cour;
use Illuminate\Http\Request;

class CommentairesController extends Controller
{
    public function index(){
        $commentaires=Commentaire::all();
        $cours=Cour::all();
        return view('admin.commentaires.index',compact('commentaires','cours'));
    }
    public function destroy($id){
    
        $commentaire=Commentaire::find($id);
        $commentaire->delete();
        return redirect('/dashboard/commentaires')->with('mssg','Commentaire deleted successfly');
    }
}
