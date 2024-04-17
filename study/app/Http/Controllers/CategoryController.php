<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

use function Laravel\Prompts\error;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.cats.index', compact('categories'));
    }
    public function create()
    {

        return view('admin.cats.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:40'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg']

        ]);
        $destinationPath = 'img/';
        $file = $request->image->getClientOriginalName();
        $request->image->move(public_path($destinationPath), $file);


        Category::create([
            'name' => $request->get('name'),
            'image' => $file

        ]);
        return redirect('/dashboard/categories')->with('mssg', 'category added successfuly');
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.cats.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {

        $category = Category::findOrFail($id);

        $data = Validator::make($request->all(), [
            'name' => ['required', 'max:40'],
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img'), $imageName);
            $category->image = 'images/' . $imageName;
        }
        $category->save();
        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->get('name'),
            'image' => $imageName
        ]);


        return redirect('/dashboard/categories')->with('mssg', 'category updated successfuly');
    }
    public function destroy(Request $request, $id)

    {
        $image_path = 'img/' . $request->image;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        $category = Category::find($id);
        $category->delete();
        return redirect('/dashboard/categories')->with('mssg', 'category deleted successfly');
    }
}
