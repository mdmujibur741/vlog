<?php

namespace App\Http\Controllers;

use App\Models\setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class settingController extends Controller
{
    public function index()
    {
            $setting = setting::first();
           return view('admin.setting.edit',compact('setting'));
    }

    public function edit(Request $request)
    {
           $setting = setting::first();

           $request->validate([
                'name' => 'required',
                'copyright' => 'required',
           ]);

           $setting->name = $request->name;
           $setting->facebook = $request->facebook;
           $setting->twitter = $request->twitter;
           $setting->instagram = $request->instagram;
           $setting->reddit = $request->reddit;
           $setting->email = $request->email;
           $setting->phone = $request->phone;
           $setting->address = $request->address;
           $setting->description = $request->description;
           $setting->copyright = $request->copyright;
           
           if($request->file('site_logo')){
           
            if(File::exists($setting->site_logo)){
                File::delete($setting->site_logo);    
            }
            $image = $request->file('site_logo');
            Storage::putFile('public/setting/',$image);
            $setting->site_logo = "storage/setting/".$image->hashName();
        }

        $setting->save();
        Session::flash('success','Setting Update Successfully!');
        return redirect()->back();
    }
}
