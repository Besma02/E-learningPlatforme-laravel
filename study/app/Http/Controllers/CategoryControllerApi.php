<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CategoryControllerApi extends Controller
{
    public function index(){
        $categories=Category::all();
        return response()->json(['categories'=>$categories]);
    }
   
    public function store(Request $request){
        $validator=Validator::make($request->all(),[
            'name'=>['required','max:40'],
            'image'=>['required','image','mimes:jpeg,png,jpg,gif,svg']

        ]);
        $destinationPath='img/';
        $file=$request->image->getClientOriginalName();
        $request->image->move(public_path($destinationPath),$file);
       
      
        Category::create([
            'name'=>$request->get('name'),
            'image'=>$file
            
        ]);
        return response()->json(['mssg'=>'category added successfuly']);
     
   
}


public function update(Request $request, $id)
    {
        $category = Category::find($id);
        
        // Validation des données
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        // Mise à jour du name
        $category->name = $request->input('name');

        // Mise à jour de l'image
        if ($request->hasFile('image')) {
            // Gérer l'upload de l'image
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $category->image = $imageName;
        }

        $category->save();

        return response()->json(['mssg' => 'category mis à jour avec succès'], 200);
    }
public function destroy(Request $request,$id)

    {   
        $image_path = 'img/'.$request->image;  
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
       
        $category=Category::find($id);
        $category->delete();
        return response()->json(['mssg'=>'category deleted successfly']);
       
    }
}
