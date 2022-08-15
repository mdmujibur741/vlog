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
                         <table class="table table-bordered bg-light">
                              <thead>
                                    <tr>
                                        <th width="18%">Name</th>
                                        <td> {{$contact->name}} </td>
                                    </tr>
                                    <tr>
                                        <th width="18%">Email</th>
                                        <td>{{$contact->email}}</td>
                                    </tr>
                                    <tr>
                                        <th width="18%">Subject</th>
                                        <td>{{$contact->subject}}</td>
                                    </tr>
                                    <tr>
                                        <th width="18%">Message</th>
                                        <td>{{$contact->message}}</td>
                                    </tr>

                              </thead>
                         </table>
                    </div>   
                </div>
            </div>
        </div>
    </div>
@endsection
