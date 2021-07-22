<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Food;

class MobileController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ping()
    {
        return  response()->json(['status'=>'true'],200);
    }

    public function latestRecipes() {
        $recipes = Food::orderBy('id', 'DESC')->limit(6)->get();
        return  response()->json($recipes,200);
    }

    public function latestCategories() {
        $categories = Category::orderBy('id', 'DESC')->limit(6)->get();
        return  response()->json($categories,200);
    } 

    public function allRecipes() {
        $recipes = Food::orderBy('id', 'DESC')->get();
        return  response()->json($recipes,200);
    } 

    public function allCategories() {
        $categories = Category::orderBy('id', 'DESC')->get();
        return  response()->json($categories,200);
    }


    public function singleCategory($id)
    {
        $category = Category::find($id);
        if($category == null){
          return response()->json(['error'=>'Category with this Id not found'],404); 
        }

        $data = $category->foods;
        return  response()->json($category,200);
    }

    public function singleRecipe($id)
    {
        $recipes = Food::find($id);
        if($recipes == null){
          return response()->json(['error'=>'Recipes with this Id not found'],404); 
        }
        return  response()->json($recipes,200);
    }


}
