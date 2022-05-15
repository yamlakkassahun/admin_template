<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\UserNotification;
use Illuminate\Support\Facades\Notification;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::simplePaginate(5);
        return view('user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.add');
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
            'name' => ['required', 'string', 'max:255'],
            'image' => '',
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = User::all();
        User::create([
            'name' => $data['name'],
            'image' => $data['image'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'type' => $data['type'],
            'email' => $data['email'],
            'password' => Hash::make(request('password'))
        ]);

        Notification::send($user,new UserNotification($data['name'],$data['email'],'User' ));
        return redirect('/employee');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::findOrFail($id);
        return view('user.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'image' => '',
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $oldData = User::findOrFail($id);


        $password = ['password' => Hash::make(request('password'))];

        $oldData->update(array_merge(
            $data,
            $password
        ));

        return redirect('/employee')->with('message', 'Employee updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::findOrFail($id);
        Storage::delete("/public/{$data->image}");
        $data->delete();
        return redirect('/employee')->with('message', 'Employee Deleted Successfully');
    }

    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $data = User::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('email', 'LIKE', "%{$search}%")
            ->orWhere('type', 'LIKE', "%{$search}%")
            ->orWhere('phone', 'LIKE', "%{$search}%")
            ->orWhere('address', 'LIKE', "%{$search}%")
            ->simplePaginate(4);

        // Return the search view with the resluts compacted
        return view('user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        if($request->hasFile('image') ) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $folder = uniqid().'-'.now()->timestamp;
            $path = $file->store('profile', 'public');
            return $path;
        }

        return '';
    }
}
