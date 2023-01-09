<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers;
class ProfileController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('profile');
    }
    
    public function upload(Request $request)
    {
        if($request->hasFile('image')) {

            $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);

            $fileName = $request->image->getClientOriginalName();
            $request->image->storeAs('images', $fileName, 'public');

            Auth()->user()->update(['image'=>$fileName]);
            return redirect()->back()->with(['status' => 'Profile updated successfully.']);
        }
        return redirect()->back();
    }
}
