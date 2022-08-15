@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <div class="row">

            <div class="col-12 p-3">
                <div class="card card-info">
                    <div class="card-header">
                        <h2 class="text-center text-bold">Setting Edit</h2>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <form action="{{ route('setting.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                @include('includes.error')



                                <div class="form-group">
                                    <label for="name"> Name</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter User Name" value="{{ $setting->name }}">
                                </div>

                                <div class="form-group">
                                    <label for="facebook"> Facebook</label>
                                    <input type="url" name="facebook" class="form-control" id="facebook" placeholder="Enter Facebook Url" value="{{ $setting->facebook }}">
                                </div>

                                <div class="form-group">
                                    <label for="twitter"> Twitter</label>
                                    <input type="url" name="twitter" class="form-control" id="twitter" placeholder="Enter Twitter Url" value="{{ $setting->twitter }}">
                                </div>

                                <div class="form-group">
                                    <label for="instagram"> Instagram</label>
                                    <input type="url" name="instagram" class="form-control" id="instagram" placeholder="Enter Instagram Url" value="{{ $setting->instagram }}">
                                </div>

                                <div class="form-group">
                                    <label for="reddit"> Reddit</label>
                                    <input type="url" name="reddit" class="form-control" id="reddit" placeholder="Enter Reddit Url" value="{{ $setting->reddit }}">
                                </div>

                                <div class="form-group">
                                    <label for="phone"> Phone</label>
                                    <input type="tel" name="phone" class="form-control" id="phone" placeholder="Enter Phone No" value="{{ $setting->phone }}">
                                </div>

                                <div class="form-group">
                                    <label for="email"> Email</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email" value="{{ $setting->email }}">
                                </div>

                                <div class="form-group">
                                    <label for="copyright"> copyright</label>
                                    <input type="copyright" name="copyright" class="form-control" id="copyright" placeholder="Enter Copyright" value="{{ $setting->copyright }}">
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" rows="4" class="form-control" placeholder="Enter Category Description"> {{ $setting->description }}  </textarea>
                                </div>


                                <div class="form-group">
                                    <label for="address">Location</label>
                                    <textarea name="address" id="address" class="form-control" rows="1" placeholder="Enter Address">{{ $setting->address }}</textarea>
                                </div>

                       
                       
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="site_logo">Logo</label>
                                            <input type="file" name="site_logo" id="site_logo" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <img src="{{ asset($setting->site_logo) }}" alt="" sizes="" srcset="" class="img-thumbnail" width="100%">
                                        </div>
                                       
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
    </div>
    @endsection
