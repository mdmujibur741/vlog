<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class contactController extends Controller
{
    public function index()
    {
          $contact = contact::latest()->paginate(20);
         return view('admin.contact.index',compact('contact'));
    }

    public function show($id)
    {
          $contact = contact::find($id);
          return view('admin.contact.show',compact('contact'));
    }

    public function destroy($id)
    {
        $contact = contact::find($id);
        $contact->delete();
        Session::flash('success', 'Post Delete Successfully');
        return redirect()->back();
    }
}
