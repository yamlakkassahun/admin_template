<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Mews\Purifier\Facades\Purifier;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Food::orderBy('id', 'DESC')->simplePaginate(4);
        return view('food.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::All();
        return view('food.add', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'nameAm' => ['required', 'string', 'max:255'],
            'ingredientsAm' => ['required', 'string'],
            'nameEn' => ['required', 'string', 'max:255'],
            'ingredientsEn' => ['required', 'string'],
            'image' => '',
            'category_id' => 'required',
            'processAm' => ['required', 'string'],
            'processEn' => ['required', 'string'],
            'foodTime' => ['required', 'string'],
            'recommend' => ['required', 'string']
        ]);


        $purifiedDataAm = ['ingredientsAm' => Purifier::clean(request('ingredientsAm'))];
        $purifiedDataEn = ['ingredientsEn' => Purifier::clean(request('ingredientsEn'))];
        $purifiedprocessAm = ['processAm' => Purifier::clean(request('processAm'))];
        $purifiedprocessEn = ['processEn' => Purifier::clean(request('processEn'))];

        Food::create(
            array_merge(
                $data,
                $purifiedDataAm,
                $purifiedDataEn,
                $purifiedprocessAm,
                $purifiedprocessEn
            )
        );

        return redirect('/food')->with('message', 'Food Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $Food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $Food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Food  $Food
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::All();
        $data = Food::findOrFail($id);

        return view('food.edit', compact('category', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Food  $Food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data = request()->validate([
            'nameAm' => ['required', 'string', 'max:255'],
            'ingredientsAm' => ['required', 'string'],
            'nameEn' => ['required', 'string', 'max:255'],
            'ingredientsEn' => ['required', 'string'],
            'image' => '',
            'category_id' => 'required',
            'processAm' => ['required', 'string'],
            'processEn' => ['required', 'string'],
            'foodTime' => ['required', 'string'],
            'recommend' => ['required', 'string']
        ]);


        $purifiedDataAm = ['ingredientsAm' => Purifier::clean(request('ingredientsAm'))];
        $purifiedDataEn = ['ingredientsEn' => Purifier::clean(request('ingredientsEn'))];
        $purifiedprocessAm = ['processAm' => Purifier::clean(request('processAm'))];
        $purifiedprocessEn = ['processEn' => Purifier::clean(request('processEn'))];

        $oldData = Food::findOrFail($id);


        $oldData->update(array_merge(
            $data,
            $purifiedDataAm,
            $purifiedDataEn,
            $purifiedprocessAm,
            $purifiedprocessEn
        ));

        return redirect('/food')->with('message', 'Food Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $Food
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Food::findOrFail($id);
        Storage::delete("/public/{$data->coverImage}");
        $data->delete();
        return redirect('/food')->with('message', 'Food Deleted Successfully');
    }

    public function search(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $data = Food::query()
            ->where('nameEn', 'LIKE', "%{$search}%")
            ->orWhere('nameAm', 'LIKE', "%{$search}%")
            ->simplePaginate(4);

        // Return the search view with the resluts compacted

        return view('food.index', compact('data'))->with('message', 'Categories Found');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $folder = uniqid() . '-' . now()->timestamp;
            $path = $file->store('uploads', 'public');
            return $path;
        }
        return '';
    }
}
