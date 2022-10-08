@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
               
                <div class="card">
                    <div class="card-header">
                      <h2 class="card-title"> Category Table</h2>
                      <div class="text-right">
                           <a href="{{route('post.create')}}" class="btn btn-primary">Add Post</a>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="overflow-x:auto">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Serial</th>
                          <th>Image</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Tag</th>
                          <th>Author</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                          @if ($post->count()>0)
                              
                       
                @foreach ($post as $key=>$item)
                    
             
                        <tr>
                          <td> {{$key+1}} </td>
                          <td> 
                               <img src="{{url($item->image)}}" class="img-fluid rounded" alt="" srcset="" width="40px">
                          </td>
                          <td> {{$item->title}} </td>
                          <td> {{$item->category->name}}</td>
                          <td>
                                  @foreach($item->tags as $tag)
                                      <span class="badge badge-primary"> {{$tag->name}} </span>
                                  @endforeach
                          </td>
                          <td> {{$item->user->name}} </td>
                          <td class="d-flex">
                                 <a href="{{route('post.show',Crypt::encryptString($item->id))}}" class="btn btn-sm btn-success mr-1"> <i class="fa-solid fa-eye"></i> </a>
                                  <a href="{{route('post.edit',Crypt::encryptString($item->id))}}" class="btn btn-sm btn-primary mr-1"> <i class="fa-solid fa-edit"></i> </a>
                                    <form action="{{route('post.destroy',$item->id)}}" method="post">
                                      @csrf
                                      @method('delete')
                                      <button type="submit" class="btn btn-sm btn-danger mr-1" onclick="return confirm('Are you sure?')"> <i class="fa-solid fa-trash"></i> </button>
                                    </form>
                          </td>     
                        </tr>
                        @endforeach
                        @else
                              <tr>
                                <td colspan="6">
                                     <h2>No Post Found</h2>
                                </td>
                              </tr>
                        @endif
                        </tfoot>
                      </table>
                    </div>
                    <!-- /.card-body -->
                 <div class="d-flex justify-content-center">
                  {{ $post->links() }}
                 </div>
                  </div>
                  
            </div>
        </div>
    </div>
@endsection