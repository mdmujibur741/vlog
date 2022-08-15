@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-header">
                        <h3>Message List</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    
                                    <th scope="col"> Serial </th>
                                    <th scope="col"> Name </th>
                                    <th scope="col"> Email </th>
                                    <th scope="col"> Message </th>
                                    <th scope="col"> Action </th>
                                </tr>
                            </thead>

                             @if($contact->count()>0)
                            <tbody>

                                @foreach ($contact as $key=>$item)
                                    <tr>
                                        <td> {{$key+1}} </td>
                                        <td> {{ $item->name }} </td>
                                        <td> {{ $item->email }} </td>
                                        <td> {{ Str::limit($item->message, 20) }}</td>
                                        <td class="d-flex">
                                            <a href="{{route('contact.show',$item->id)}}" class="btn btn-sm btn-success mr-1"> <i class="fa-solid fa-eye"></i> </a>

                                            <form action="{{route('contact.delete',$item->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger mr-1" onclick="return confirm('Are you sure?')"> <i class="fa-solid fa-trash"></i> </button>
                                            </form>
                                        </td>
                                    </tr>
                               @endforeach

                            </tbody>
                             @else
                             <tr>
                                <td colspan="5">
                                     <h2>No Message Found</h2>
                                </td>
                              </tr>
                            @endif
                        </table>
                    </div>
                   
                        <div class="d-flex justify-content-center">
                        
                          {{$contact->links()}}
                        </div>
                      
                </div>
            </div>
        </div>
    </div>
@endsection
