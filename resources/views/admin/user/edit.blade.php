@extends('layouts.admin')
@section('content')

<div class="container-fluid">
   
    <div class="row">

        <div class="col-12 p-3">
            <div class="card card-primary">
                <div class="card-header">
                    <h2 class="text-center text-bold">User Edit</h2>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                 <div class="card-body">
                  <form action="{{route('user.update',$user->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                  <div class="card-body">
                       @include('includes.error')



                    <div class="form-group">
                      <label for="name"> Name</label>
                      <input type="text" name="name" class="form-control" id="name" placeholder="Enter User Name" value="{{$user->name}}">
                    </div>

                    <div class="form-group">
                      <label for="email"> Email</label>
                      <input type="email" name="email" class="form-control" id="email" placeholder="Enter User Email" value="{{$user->email}}">
                    </div>

                    <div class="form-group">
                      <label for="password"> Password (<small> if you want Change Password Than Enter</small>) </label>
                      <input type="password" name="password" class="form-control" id="password" placeholder="Enter User Password">
                    </div>

                    <div class="form-group">
                      <label for="description">Description</label>
                       <textarea name="description" id="description" rows="4" class="form-control" placeholder="Enter Category Description"> {{$user->description}} </textarea>
                    </div>
                    <div class="form-group">
                      <label for="image">Image</label>
                       <input type="file" name="image" id="image" class="form-control">
                    </div>
      
                   
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                 
                </form>
             
              </div>
        </div>
    </div>

</div>




@endsection