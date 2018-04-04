@extends('layouts.app')

@section('content')
    @include('includes.errors')

    <div class="card">
        <div class="card-header">
          Create a new tag
        </div>
        <div class="card-body">
          <form action="{{route('tags.store')}}" method="post">
                @csrf
    
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">
                            Save
                        </button>
                    </div>
                </div>
          </form>
        </div>
    </div>
@endsection
