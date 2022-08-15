@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Starter Page</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Starter Page</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
              
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3> {{$postCount}} </h3>

                <p>Post</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{route('post.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3> {{$categoryCount}}</h3>

                <p>Category</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{route('category.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$tagCount}}</h3>

                <p>Tag</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{route('tag.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3> {{$userCount}} </h3>

                <p>User</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{route('user.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        
      </div>

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
              </div>
              
        </div>
    </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection