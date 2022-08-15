@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
               
                <div class="card">
                    <div class="card-header">
                      <h2 class="card-title"> Category Table</h2>
                      <div class="text-right">
                           <a href="{{route('user.create')}}" class="btn btn-primary">Add User</a>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Serial</th>
                          <th>Name</th>
                          <th>Email(s)</th>
                          <th> Image </th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                          @if ($user->count()>0)
                              
                       
                @foreach ($user as $key=>$item)
                    
             
                        <tr>
                          <td> {{$key+1}} </td>
                          <td> {{$item->name}} </td>
                          <td> {{$item->email}} </td>
                          <td> 
                                <img src="{{asset($item->image)}}" alt="" class="img-fluid" srcset="" width="50px">  
                          </td>
                          <td class="d-flex">
                                 {{-- <a href="{{route('category.show',Crypt::encryptString($item->id))}}" class="btn btn-sm btn-success mr-1"> <i class="fa-solid fa-eye"></i> </a> --}}
                                  <a href="{{route('user.edit',Crypt::encryptString($item->id))}}" class="btn btn-sm btn-primary mr-1"> <i class="fa-solid fa-edit"></i> </a>
                                    <form action="{{route('user.destroy',$item->id)}}" method="post">
                                      @csrf
                                      @method('delete')
                                      <button type="submit" class="btn btn-sm btn-danger mr-1" onclick="return confirm('Are you sure?')"> <i class="fa-solid fa-trash"></i> </button>
                                    </form>
                          </td>     
                        </tr>
                        @endforeach
                        @else
                              <tr>
                                <td colspan="5">
                                     <h2>No Category Found</h2>
                                </td>
                              </tr>
                        @endif
                        </tfoot>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  
            </div>
        </div>
    </div>
@endsection