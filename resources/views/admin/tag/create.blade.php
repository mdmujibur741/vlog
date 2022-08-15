@extends('layouts.admin')
@section('content')

<div class="container-fluid">

    <div class="row">

        <div class="col-12 p-3">
            <div class="card card-primary">
                <div class="card-header">
                    <h2 class="text-center text-bold">Tag Create</h2>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('tag.store')}}" method="post">
                    @csrf
                  <div class="card-body">
                       @include('includes.error')
                    <div class="form-group">
                      <label for="name">Tag Name</label>
                      <input type="text" name="name" class="form-control" id="name" placeholder="Enter Tag Name">
                    </div>
                    <div class="form-group">
                      <label for="description">Description</label>
                       <textarea name="description" id="description" rows="4" class="form-control" placeholder="Enter Tag Description"></textarea>
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