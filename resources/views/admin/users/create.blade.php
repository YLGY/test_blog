@extends('layouts.app')

@section('content')
    @include('includes.errors')

    <div class="card">
        <div class="card-header">
          Create a new user
        </div>
        <div class="card-body">
          <form action="{{route('users.store')}}" method="post">
                @csrf
    
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">
                            Add user
                        </button>
                    </div>
                </div>
          </form>
        </div>
    </div>
@endsection
