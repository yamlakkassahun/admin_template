<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;


class MobileController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allPost()
    {
        $posts = Post::all();
        return  response()->json($posts,200);
    }
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function singlePost($id)
    {
        $post = Post::find($id);
        if($post == null){
          return response()->json(['error'=>'post with this Id not found'],404);  
        }
        return response()->json($post,200);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function latestPost()
    {
        $latest = Post::orderBy('id', 'DESC')->limit(6)->get();
        return  response()->json($latest, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function latestAdultsPost()
    {
        $latest = Post::orderBy('id', 'DESC')->where('group', 'adult')->limit(6)->get();
        return  response()->json($latest, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function latestKidsPost()
    {
        $latest = Post::orderBy('id', 'DESC')->where('group', 'kid')->limit(6)->get();
        return  response()->json($latest, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adultsPost()
    {
        $latest = Post::orderBy('id', 'DESC')->where('group', 'adult')->get();
        return  response()->json($latest, 200);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function kidsPost()
    {
        $latest = Post::orderBy('id', 'DESC')->where('group', 'kid')->get();
        return  response()->json($latest, 200);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allCategory()
    {
        $categories = Category::all();
        return  response()->json($categories,200);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function singleCategory($id)
    {
        $category = Category::find($id);
        if($category == null){
          return response()->json(['error'=>'Category with this Id not found'],404); 
        }
        return  response()->json($category,200);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adultsCategory()
    {
        $categories = Category::orderBy('id', 'DESC')->where('group', 'adult')->get();
        return  response()->json($categories,200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function kidsCategory()
    {
        $categories = Category::orderBy('id', 'DESC')->where('group', 'kid')->get();
        return  response()->json($categories,200);
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ping()
    {
        return  response()->json(['status'=>'true'],200);
    }
}
