@extends('layouts.admin')
@section('content')
    <div class="container-fluid">

        <div class="row">

            <div class="col-12 p-3">
                <div class="card card-primary">
                    <div class="card-header">
                        <h2 class="text-center text-bold">Post Edit</h2>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->



                    <form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            @include('includes.error')
                            <div class="form-group">
                                <label for="title"> Post Title </label>
                                <input type="text" name="title" class="form-control" id="title"
                                    placeholder="Enter Post Title Name" value="{{ $post->title }}">
                            </div>

                            <div class="form-group">
                                <label for="category"> Category </label>
                                <select name="category" id="category" class="form-control">
                                    <option value="" selected class="d-none">Choose Category</option>
                                    @foreach ($category as $item)
                                        <option value="{{ $item->id }}" @selected($item->id == $post->category_id)>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Choose Tag</label>
                                <div class="d-flex">
                                    @foreach ($tag as $tag)
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input class="custom-control-input" type="checkbox" name="tags[]"
                                            id="chek{{ $tag->id }}" value="{{ $tag->id }}"
                                            @foreach ($post->tags as $t) @checked($tag->id == $t->id)
                                            @endforeach
                                        >
                                        <label for="chek{{ $tag->id }}"
                                            class="custom-control-label">{{ $tag->name }}</label>
                                    </div>
                                @endforeach
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="summernote">Description</label>
                                <textarea name="description" id="summernote" rows="4" class="form-control"
                                    placeholder="Enter Category Description"> {{ $post->description }} </textarea>
                            </div>


                            <div class="row">
                                <div class="col-8">

                                    <div class="mb-3">
                                        <label class="image" for="image">Choose file</label>
                                        <input type="file" name="image" class="form-control" id="image">

                                    </div>
                                </div>
                                <div class="col-4">
                                    <img src="{{ url($post->image) }}" alt="" srcset="" wi
                                        class="img-thumbnail" style=" width:100%;">
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