@extends('layouts.admin')
@section('content')

<div class="container-fluid">

    <div class="row">

        <div class="col-12 p-3">
            <div class="card card-primary">
                <div class="card-header">
                    <h2 class="text-center text-bold">User Create</h2>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                       @include('includes.error')
                    <div class="form-group">
                      <label for="name"> Name</label>
                      <input type="text" name="name" class="form-control" id="name" placeholder="Enter User Name">
                    </div>

                    <div class="form-group">
                      <label for="email"> Email</label>
                      <input type="email" name="email" class="form-control" id="email" placeholder="Enter User Email">
                    </div>

                    <div class="form-group">
                      <label for="password"> Password</label>
                      <input type="password" name="password" class="form-control" id="password" placeholder="Enter User Password">
                    </div>

                    <div class="form-group">
                      <label for="description">Description</label>
                       <textarea name="description" id="description" rows="4" class="form-control" placeholder="Enter Category Description"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="image">Image</label>
                       <input type="file" name="image" id="image" class="form-control">
                    </div>
                   
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
        </div>
    </div>
</div>




@endsection