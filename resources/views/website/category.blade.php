@extends('layouts.website')
  @section('content')
      
 
  

    {{-- <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
     --}}
  
    
    
    <div class="py-5 bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <span>Category</span>
            <h3> {{$category->name}}({{$count}}) </h3>
            <p> {{$category->description}} </p>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-white">
      <div class="container">
        <div class="row">
           @foreach ($post as $item)
           <div class="col-lg-4 mb-4">
            <div class="entry2">
              <a href="{{route('website.post',$item->slug)}}"><img src="{{$item->image}}" alt="Image" class="img-fluid rounded"></a>
              <div class="excerpt">
              <span class="post-category text-white bg-secondary mb-3"> {{$item->category->name}} </span>

              <h2><a href="single.html"> {{$item->title}} </a></h2>
              <div class="post-meta align-items-center text-left clearfix">
                <figure class="author-figure mb-0 mr-3 float-left"><img src="@if($item->user->image){{asset($item->user->image)}}@else{{asset('storage/user/user.png')}}@endif" alt="Image" class="img-fluid"></figure>
                <span class="d-inline-block mt-1">By <a href="#"> {{$item->user->name}} </a></span>
                <span>&nbsp;-&nbsp; {{$item->created_at->format('M d, Y')}} </span>
              </div>
              
                <p> {{$item->description}} </p>
                <p><a href="{{route('website.post',$item->slug)}}">Read More</a></p>
              </div>
            </div>
          </div>
           @endforeach
          
       
        </div>
        <div class="row text-center pt-5 border-top">
          <div class="col-md-12">
            {{$post->links()}}
          </div>
      </div>
    </div>
  </div>
    
  @endsection
    
   
 

