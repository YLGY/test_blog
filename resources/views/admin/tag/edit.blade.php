@extends('layouts.app')

@section('content')
    @include('includes.errors')

    <div class="card">
        <div class="card-header">
          Edit Tag: {{ $tag->name }}
        </div>
        <div class="card-body">
          <form action="{{route('tags.update', ['id' => $tag->id])}}" method="post">
                @csrf
                @method('PUT')
    
                <div class="form-group">
                    <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $tag->tag }}">
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
