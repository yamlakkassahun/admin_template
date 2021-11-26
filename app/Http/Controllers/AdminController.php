<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $employee = User::All();
        return view('admin.dashboard' , compact('employee'));
    }

    public function search(Request $request)
    {
        // // Get the search value from the request
        // $search = $request->input('search');

        // // Search in the title and body columns from the posts table
        // $data = Post::query()
        //     ->where('name', 'LIKE', "%{$search}%")
        //     ->orWhere('description', 'LIKE', "%{$search}%")
        //     ->orWhere('category', 'LIKE', "%{$search}%")
        //     ->orWhere('group', 'LIKE', "%{$search}%")
        //     ->simplePaginate(4);

        // // Return the search view with the resluts compacted

        // return view('posts.index', compact('data'))->with('message', 'Categories Found');
    }
}
