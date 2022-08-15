<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class userController extends Controller
{
    public function __construct() 
    {
      $this->middleware('auth');
    }

    public function index()
    {
          $user = User::latest()->paginate(5);
          return view('admin.user.index',compact('user'));
    }
    public function store(Request $request)
    {
           $user = new User();
           $request->validate([
                 'name' => 'required|string|max:255',
                 'email' => 'required|unique:users,email|max:255',
                 'password' => 'required|max:255',
                 'image' => 'required|image',
           ]);

           $user->name = $request->name;
           $user->email = $request->email;
           $user->password = bcrypt($request->password);
           $user->description = $request->description;
           $image =$request->file('image');
           Storage::putFile('public/user/',$image);
           $user->image = "Storage/user/".$image->hashName();
           $user->save();
           Session::flash('success', 'Post Add Successfully');
           return redirect()->back();
    }
    public function create()
    {
          return view('admin.user.create');
    }
    public function edit($edit_id)
    {
          $id = Crypt::decryptString($edit_id);
           $user = User::find($id);
          return view('admin.user.edit',compact('user'));
    }
    public function update(Request $request,$id)
    {
          $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|max:255',
            'password' => 'sometimes|nullable|max:255',
      ]);
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->description = $request->description;   
            $user->password = bcrypt($request->password);     
         if($request->file('image')){
            if(File::exists($user->image)){
                File::delete($user->image);    
            }
            $image = $request->file('image');
            $imageName = uniqid().'.'.$image->getClientOriginalExtension();
            Storage::putFile('public/user/',$image);
            $user->image = "storage/user/".$image->hashName();

        }
          
           $user->update(); 
          Session::flash('success', 'User Update Successfully');
          return redirect()->route('user.index');
    }
    public function destroy(Request $request,$id)
    {
            $user = User::find($id);
            @unlink(public_path($user->image));
            $user->delete();
            Session::flash('success', 'User Delete Successfully');
            return redirect()->back();
    }

    public function profile()
    {
         $user = auth()->user();
        return view('admin.user.profile',compact('user'));
    }

    public function profile_update(Request $request)
    {
      $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|max:255',
            'password' => 'sometimes|nullable|max:255',
      ]);
            $user = auth()->user();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->description = $request->description;   
           if($request->password ==!null){
            $user->password = bcrypt($request->password); 
           }    
         if($request->file('image')){
            if(File::exists($user->image)){
                  @unlink(public_path($user->image));  
            }
            $image = $request->file('image');
            Storage::putFile('public/user/',$image);
            $user->image = "storage/user/".$image->hashName();

        }
          
            $user->update();
          Session::flash('success', 'User Update Successfully');
          return redirect()->back();
    }
}
