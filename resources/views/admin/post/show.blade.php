@extends('layouts.admin')
@section('content')
    <div class="container-fluid">

        <div class="row">

            <div class="col-12 p-3">
                <div class="card card-primary">
                    <div class="card-header">
                        <h2 class="text-center text-bold">View Post</h2>
                    </div>
                    <!-- /.card-header -->
                     <div class="card-body">
                          <table class="table table-bordered table-primary">
                                <thead>
                                      <tr>
                                         <th style="width: 20%"> Image </th>
                                         <td>
                                              <img src="{{url($post->image)}}" alt="image" class="img-thumbnail" width="25%">
                                         </td>
                                      </tr>
                                      <tr>
                                        <th style="width: 20%"> Title </th>
                                        <td> {{$post->title}} </td>
                                     </tr>
                                     <tr>
                                        <th style="width: 20%">Slug</th>
                                        <td> {{$post->slug}} </td>
                                     </tr>
                                     <tr>
                                        <th style="width: 20%">Category</th>
                                        <td> {{$post->category->name}} </td>
                                     </tr>
                                     <tr>
                                        <th style="width: 20%">Tag</th>
                                        <td>
                                              @foreach($post->tags as $tag)
                                              <span class="badge badge-primary"> {{$tag->name}} </span>
                                              @endforeach
                                        </td>
                                     </tr>
                                     <tr>
                                        <th style="width: 20%">Author</th>
                                        <td>{{$post->user->name}}</td>
                                     </tr>
                                     <tr>
                                        <th style="width: 20%">Description</th>
                                        <td>{!!$post->description!!}</td>
                                     </tr>
                                </thead>
                          </table>
                     </div>
                       
                </div>
            </div>
        </div>
    </div>
@endsection
