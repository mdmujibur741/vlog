@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
               
                <div class="card">
                    <div class="card-header">
                      <h2 class="card-title"> Category Table</h2>
                      <div class="text-right">
                           <a href="{{route('tag.create')}}" class="btn btn-primary">Add Tag</a>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Serial</th>
                          <th>Name</th>
                          <th>Slug(s)</th>
                          <th>Post Count</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
      
               
                   
               @if ($tags->count()>0)
                @foreach ($tags as $key=>$item)
                    
             
                        <tr>
                          <td> {{$key+1}} </td>
                          <td> {{$item->name}} </td>
                          <td> {{$item->slug}} </td>
                          <td> {{$key+2}} </td>
                          <td class="d-flex">
                              
                                  <a href="{{route('tag.edit',Crypt::encryptString($item->id))}}" class="btn btn-sm btn-primary mr-1"> <i class="fa-solid fa-edit"></i> </a>
                                    <form action="{{route('tag.destroy',$item->id)}}" method="post">
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
                                     <h5>No Tag Found</h5>
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