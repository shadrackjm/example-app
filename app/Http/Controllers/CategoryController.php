<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('categories.index',['categories' => $categories]);
    }

    public function create(){
        return view('categories.create');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        try{
            $category = new Category();
            $category->name = $request->name;
            $category->description = $request->description;
            $category->save();
    
            return redirect()->route('categories.index')->with('success', 'Category created successfully.');
        }catch(\Exception $e){
            return redirect()->route('categories.index')->with('error', 'Category creation failed.');
        }
    }

    public function show($id){
        $category = Category::find($id);
        return view('categories.show', compact('category'));
    }

    public function edit($id){
        $category = Category::find($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        try{
            $category = Category::find($id);
            $category->name = $request->name;
            $category->description = $request->description;
            $category->save();
    
            return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
        }catch(\Exception $e){
            return redirect()->route('categories.index')->with('error', 'Category update failed.');
        }
    }

    public function destroy($id){
        try{
            $category = Category::find($id);
            $category->delete();
    
            return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
        }catch(\Exception $e){
            return redirect()->route('categories.index')->with('error', 'Category deletion failed.');
        }
    }
}
