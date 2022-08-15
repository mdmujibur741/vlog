@extends('layouts.website')
@section('content')    
    <div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('{{ asset('website') }}/images/img_4.jpg');">
        <div class="container">
        <div class="row same-height justify-content-center">
            <div class="col-md-12 col-lg-10">
            <div class="post-entry text-center">
                <h1 class="">About Us</h1>
                <p class="lead mb-4 text-white">@if($user->name) {{$user->name}} @else{{Guest}} @endif </p>
            </div>
            </div>
        </div>
        </div>
    </div>

    <div class="site-section bg-light">
        <div class="container">
        <div class="row">
            <div class="col-md-6 order-md-2">
            <img src="@if($user->image){{asset($user->image)}}@else{{ asset('storage/user/user.png') }} @endif " alt="Image" class="img-fluid">
            </div>
            <div class="col-md-5 mr-auto order-md-1">
                <h2>@if($user->name) {{$user->name}} @else{{Guest}} @endif</h2>
                <p> @if($user->description) {{$user->description}} @endif</p>
            </div>
        </div>
        </div>
    </div>

    <div class="site-section bg-white" style="margin: 0 !important;">
        <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-md-5">
            <div class="subscribe-1 ">
                <h2>Subscribe to our newsletter</h2>
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit nesciunt error illum a explicabo, ipsam nostrum.</p>
                <form action="#" class="d-flex">
                <input type="text" class="form-control" placeholder="Enter your email address">
                <input type="submit" class="btn btn-primary" value="Subscribe">
                </form>
            </div>
            </div>
        </div>
        </div>
    </div>
@endsection