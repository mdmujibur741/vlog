<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;

class CategoryController extends Controller
{
       public function __construct() 
       {
         $this->middleware('auth');
       }

       public function index()
       {
              $category = Category::orderBy('created_at', 'DESC')->paginate(20);
              return view('admin.category.index', compact('category'));
       }

       public function create()
       {
              return view('admin.category.create');
       }

       public function store(Request $request)
       {
              $category = new Category();

              $request->validate([
                     'name' => 'required|unique:categories,name',
              ]);

              $category->name = $request->name;
              $category->description = $request->description;
              $category->slug = Str::of($request->name)->slug('-');
              $category->save();
              Session::flash('success', 'Category Add Successfully');
              return redirect()->back();
       }

       public function edit($edit_id)
       {
              $id = Crypt::decryptString($edit_id);

              $category = Category::findOrFail($id);
              // return $category;
              return view('admin.category.edit', compact('category'));
       }

       public function update(Request $request, $id)
       {
              $category = Category::find($id);

              $request->validate([
                     'name' => 'required',
              ]);

              $category->name = $request->name;
              $category->description = $request->description;
              $category->slug = Str::of($request->name)->slug('-');
              $category->update();
              Session::flash('success', 'Category Update Successfully');
              Session::flash('delete', 'Category Update Successfully');
              return redirect()->route('category.index');
       }

       function destroy($delete_id)
       {
               $id = Crypt::decryptString($delete_id);
                $category = Category::find($id);
                $category->delete();
                Session::flash('success', 'Category Delete Successfully');
                return redirect()->back();
       }
}
