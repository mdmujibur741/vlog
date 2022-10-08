<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\contact;
use App\Models\post;
use App\Models\setting;
use App\Models\tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;


class FrontendController extends Controller
{
    public function home()
    {
         $post = post::orderBy('created_at','DESC')->take(5)->get();
          $headOne = $post->slice(0,2);
          $headTwo = $post->slice(2,1);
          $headThree = $post->slice(3,2);

          $footerOne = $post->slice(0,1);
          $footerTwo = $post->slice(1,2);
          $footerThree = $post->slice(4,1);
          

         $recentPost = post::with('category','user')->orderBy('created_at','DESC')->paginate(9);
        return view('website.home',compact('recentPost','headOne','headTwo','headThree','footerOne','footerTwo','footerThree'));
    }


    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();

          if($category){
            
             $post = post::where('category_id', $category->id)->paginate(9);
             $count = Post::where('category_id', $category->id)->get()->count();
              return view('website.category',compact('post','category','count'));
          }else{
            return view('website.home');
           }
       
    }

    public function post($slug)
    {
        $post = post::with('category','user')->where('slug', $slug)->first();
        $posts = post::orderBy('created_at','asc')->take(3)->get();
        $category = Category::all();
        $tag = tag::all();
        // return $tag;

        // releted post slice method
        $releted_post = post::where('category_id',$post->category_id)->inRandomOrder()->take(5)->get();
        $postOne = $releted_post->slice(0,1);
        $postTwo = $releted_post->slice(1,2);      
        $postThree = $releted_post->slice(3,1);
        if($post){
            return view('website.post',compact('post','posts','category','tag','postOne','postTwo','postThree'));
    }else{
             return redirect('/');
    }
    }

    public function about()
    {
         $user = User::first();
        return view('website.about',compact('user'));
    }

    public function contact()
    {
         $setting = setting::first();
        return view('website.contact',compact('setting'));
    }

    public function message(Request $request)
    {
         $request->validate([
            'name' => 'required|max:60',
            'email' => 'required|email',
            'subject' => 'required|max:100',
            'message' => 'required|min:40',
         ]);

          $contact = new contact();
          $contact->name = $request->name;
          $contact->email = $request->email;
          $contact->subject = $request->subject;
          $contact->message = $request->message;
          $contact->save();
          Session::flash('success', 'Message Send Successfully');
          return redirect()->back();
    }

    public function tag($slug)
    {
          $tag = tag::where('slug', $slug)->first();
          if($tag){
                  $post = $tag->posts()->orderBy('created_at', 'desc')->paginate(9);
                
                  return view('website.tag', compact('tag', 'post'));
          }else{
                return redirect('/');
          }
    }
}
