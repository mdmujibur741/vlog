<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\post;
use App\Models\tag;
use App\Models\User;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index()
    {
        $postCount = post::all()->count();
        $categoryCount = Category::all()->count();
        $tagCount = tag::all()->count();
        $userCount = User::all()->count();
        $post = post::orderBy('created_at', 'DESC')->take(10)->get();
        return view('admin.dashboard.index',compact('post','postCount','categoryCount','tagCount','userCount'));
    }
}
