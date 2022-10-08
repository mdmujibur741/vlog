@extends('layouts.admin')
@section('content')
    <div class="container-fluid">

        <div class="row">

            <div class="col-12 p-3">
                <div class="card card-primary">
                    <div class="card-header">
                        <h2 class="text-center text-bold">Post Create</h2>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            @include('includes.error')
                            <div class="form-group">
                                <label for="title"> Post Title </label>
                                <input type="text" name="title" class="form-control" id="title"
                                    placeholder="Enter Post Title Name" value="{{ old('title') }}">
                            </div>

                            <div class="form-group">
                                <label for="category"> Category </label>
                                <select name="category" id="category" class="form-control">
                                    <option value="" selected class="d-none">Choose Category</option>
                                    @foreach ($category as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            
                            <div class="form-group">
                                <label for="">Choose Tag</label>
                                <div class="d-flex">
                                    @foreach ($tag as $tag)
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input class="custom-control-input" type="checkbox" name="tags[]" id="chek{{ $tag->id }}" value="{{$tag->id}}" >
                                        <label for="chek{{ $tag->id }}"
                                            class="custom-control-label">{{ $tag->name }}</label>
                                    </div>
                                @endforeach
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="summernote">Description</label>
                                <textarea name="description" id="summernote" rows="10" class="form-control"
                                    placeholder="Enter Category Description"> {{ old('description') }} </textarea>
                            </div>

                            <div class="mb-3">
                                <label class="image" for="image">Choose file</label>
                                <input type="file" name="image" class="form-control" id="image">

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

@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css" integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.js" integrity="sha512-ZESy0bnJYbtgTNGlAD+C2hIZCt4jKGF41T5jZnIXy4oP8CQqcrBGWyxNP16z70z/5Xy6TS/nUZ026WmvOcjNIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(function () {
      // Summernote
      $('#summernote').summernote()
      // CodeMirror
      CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai",
        
      });
    })
  </script>
@endsection