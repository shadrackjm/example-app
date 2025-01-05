<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Category;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index(){
        // $recipes = Recipe::all();
        //eager loading
        $recipes = Recipe::with('category')->paginate(5);
        return view('recipes.index',['recipes' => $recipes]);
    }

    public function create(){
        $categories = Category::all();
        return view('recipes.create', ['categories' => $categories]);
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|unique:recipes|max:255',
            'description' => 'required',
            'ingredients' => 'required',
            'instructions' => 'required',
            'category_id' => 'required',
        ]);

        try{
            $recipe = new Recipe();
            $recipe->name = $request->name;
            $recipe->description = $request->description;
            $recipe->ingredients = $request->ingredients;
            $recipe->instructions = $request->instructions;
            $recipe->image = $request->image;
            $recipe->category_id = $request->category_id;
            $recipe->save();
    
            return redirect()->route('recipes.index')->with('success', 'Recipe created successfully.');
        }catch(\Exception $e){
            return redirect()->route('recipes.index')->with('error', 'Recipe creation failed.');
        }
    }

    public function show($id){
        $recipe = Recipe::find($id);
        return view('recipes.show', compact('recipe'));
    }

    public function edit($id){
        $recipe = Recipe::find($id);
        return view('recipes.edit', compact('recipe'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'ingredients' => 'required',
            'instructions' => 'required',
        ]);

        try{
            $recipe = Recipe::find($id);
            $recipe->name = $request->name;
            $recipe->description = $request->description;
            $recipe->ingredients = $request->ingredients;
            $recipe->instructions = $request->instructions;
            $recipe->image = $request->image;
            $recipe->save();
    
            return redirect()->route('recipes.index')->with('success', 'Recipe updated successfully.');
        }catch(\Exception $e){
            return redirect()->route('recipes.index')->with('error', 'Recipe update failed.');
        }

    }

    public function destroy($id){
        try{
            $recipe = Recipe::find($id);
            dd($recipe);
            $recipe->delete();
    
            return redirect()->route('recipes.index')->with('success', 'Recipe deleted successfully.');
        }catch(\Exception $e){
            return redirect()->route('recipes.index')->with('error', 'Recipe deletion failed.');
        }
    }
    
}
