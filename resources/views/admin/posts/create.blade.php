@extends('layouts.app')

@section('content')
    @include('includes.errors')

    <div class="card">
        <div class="card-header">
          Create a new post
        </div>
        <div class="card-body">
          <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
                @csrf
    
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="featured">
                        Featured Image
                    </label>
                    <input type="file" name="featured" id="featured" class="form-control-file">
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category_id" id="category" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Select tags</label>
                    @foreach ($tags as $tag)
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" value="{{ $tag->id }}" name="tags[]">{{ $tag->tag }}
                            </label>
                          </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="content">
                        Content
                    </label>
                    <textarea name="content" id="content" cols="5" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">
                            Post
                        </button>
                    </div>
                </div>
          </form>
        </div>
    </div>
@endsection

@section('styles')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet" >
@endsection

@section('scripts')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

    <script>
        $(document).ready(function() {
            $('#content').summernote();
        });
    </script>
@endsection

