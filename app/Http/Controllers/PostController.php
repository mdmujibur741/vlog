<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\Category;
use App\Models\post;
use App\Models\tag;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

// use File;
// use Illuminate\Support\Facades\File as FacadesFile;

class PostController extends Controller
{

    public function __construct() 
    {
      $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $post = post::orderBy('created_at','DESC')->paginate(20);
          $category = Category::all();
          $user = User::all();
          return view('admin.post.index',compact('post','category','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $category = Category::all();
         $tag = tag::all();
        return view('admin.post.create',compact('category','tag'));
    
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|unique:posts,title|max:255',
            'category' => 'required',
            'image' => 'required|image',
        ]);
        $post = new post();

         $post->title = $request->title;
         $post->slug = Str::of($request->title)->slug('-');
         $post->category_id = $request->category;
         $post->description = $request->description;
         $post->user_id = auth()->user()->id;
         $post->published_at = Carbon::now();


        $image = $request->file('image');
        Storage::putFile('public/post/',$image);
        $post->image = "storage/post/". $image->hashName();

         $post->save();
         $post->tags()->attach($request->tags);
         Session::flash('success', 'Post Add Successfully');
         return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($show_id)
    {
         $id = Crypt::decryptString($show_id);
         $post = post::find($id);
        //  dd($post);
         return view('admin.post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($edit_id)
    {
         $id =  Crypt::decryptString($edit_id);
         $post = post::find($id);
         $category = Category::all();
         $tag = tag::all();
         return view('admin.post.edit',compact('post','category','tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = post::find($id);
        $request->validate([
            'title' => 'required|max:255',
            'category' => 'required|unique:posts,title,$post->id',
        ]);

      
        $post->title = $request->title;
        $post->slug = Str::of($request->title)->slug('-');
        $post->category_id = $request->category;
        $post->description = $request->description;

        if($request->file('image')){
           
            if(File::exists($post->image)){
                File::delete($post->image);    
            }
            $image = $request->file('image');
            $imageName = uniqid().'.'.$image->getClientOriginalExtension();
            Storage::putFile('public/post/',$image);
            $post->image = "storage/post/".$image->hashName();

        }
        $post->tags()->sync($request->tags);
        $post->update();
        Session::flash('success', 'Post Update Successfully');
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
         $post = post::find($id);
         @unlink(public_path($post->image));
         $post->delete();
         Session::flash('success', 'Post Delete Successfully');
         return redirect()->back();
    }
}
