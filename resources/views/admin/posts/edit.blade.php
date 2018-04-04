@extends('layouts.app')

@section('content')
    @include('includes.errors')

    <div class="card">
        <div class="card-header">
          Create a new post
        </div>
        <div class="card-body">
          <form action="{{route('posts.update', ['id' => $post->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}">
                </div>
                <div class="form-group row">
                    <div class="col-3">
                        <label for="featured" class="mr-2">
                            Featured Image
                        </label>
                        <img src="{{ asset($post->featured) }}" alt="post title" height="50px" width="50px">
                    </div>
                    <div class="col-9">
                            <input type="file" name="featured" id="featured" class="form-control-file align-bottom">
                    </div>
                </div>
                <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category_id" id="category" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" 
                                    @if ($post->category_id == $category->id)
                                        selected
                                    @endif    
                                >{{ $category->name }}</option>
                            @endforeach
                        </select>
                </div>
                <div class="form-group">
                    <label>Select tags</label>
                    @foreach ($tags as $tag)
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" value="{{ $tag->id }}" name="tags[]" 
                                    @foreach ($post->tags as $t)
                                        @if ($tag->id == $t->id)
                                            checked
                                        @endif
                                    @endforeach
                                >{{ $tag->tag }}
                            </label>
                            </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="content">
                        Content
                    </label>
                    <textarea name="content" id="content" cols="5" rows="5" class="form-control">{{ $post->content }}</textarea>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">
                            Update
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