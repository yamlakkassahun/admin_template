<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Mews\Purifier\Facades\Purifier;
use App\Models\TenporaryFile;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::orderBy('id', 'DESC')->simplePaginate(4);
        return view('category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.add');
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
            'descriptionAm' => ['required', 'string'],
            'nameEn' => ['required', 'string', 'max:255'],
            'descriptionEn' => ['required', 'string'],
            'group' => ['required', 'string', 'max:255'],
            'coverImage' => 'required',
            'color' => ['required', 'string']
        ]);
        $purifiedData = ['description' => Purifier::clean(request('description'))];

        Category::create(
            array_merge(
                $data,
                $purifiedData
            )
        );

        return redirect('/category')->with('message', 'Category Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Category::findOrFail($id);
        return view('category.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data = request()->validate([
            'nameAm' => ['required', 'string', 'max:255'],
            'descriptionAm' => ['required', 'string'],
            'nameEn' => ['required', 'string', 'max:255'],
            'descriptionEn' => ['required', 'string'],
            'group' => ['required', 'string', 'max:255'],
            'coverImage' => '',
            'color' => ['required', 'string']
        ]);


        $oldData = Category::findOrFail($id);

        $purifiedData = ['description' => Purifier::clean(request('description'))];

        $oldData->update(array_merge(
            $data,
            $purifiedData
        ));

        return redirect('/category')->with('message', 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Category::findOrFail($id);
        Storage::delete("/public/{$data->coverImage}");
        Storage::delete("/public/{$data->logo}");
        $data->delete();
        return redirect('/category')->with('message', 'Category Deleted Successfully');
    }

    public function search(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $data = Category::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->simplePaginate(4);

        // Return the search view with the resluts compacted

        return view('category.index', compact('data'))->with('message', 'Categories Found');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        if ($request->hasFile('coverImage')) {
            $file = $request->file('coverImage');
            $filename = $file->getClientOriginalName();
            $folder = uniqid() . '-' . now()->timestamp;
            $path = $file->store('uploads', 'public');
            return $path;
        }
        return '';
    }
}
