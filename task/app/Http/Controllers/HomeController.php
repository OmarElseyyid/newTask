<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
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
        $user = auth()->user();
        return view('home', ['user' => $user]);
    }
    public function imageUploadPost(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $userDB = User::find($user->id);

        if ($request->image !== null) {

            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            
            $userDB->image = $imageName;
        }
        if ($request->password !== null) {
            $userDB->password = Hash::make($request->password);
        }
        $userDB->name = $request->name;
        $userDB->email = $request->email;
       
        $userDB->save();
        

        return back(); 
    }
}
