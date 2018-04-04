@extends('layouts.app')

@section('content')
    @include('includes.errors')

    <div class="card">
        <div class="card-header">
          {{ $user->name }}'s Profile
        </div>
        <div class="card-body">
          <form action="{{route('profiles.update', ['id' => $user->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
    
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
                </div>

                <div class="form-group">
                    <label for="about">
                        About you
                        <textarea name="about" id="about" cols="30" rows="3" class="form-control">{{ $user->profile->about }}</textarea>
                    </label>
                    
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
                </div>

                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>

                <div class="form-group">
                    <label for="featured" class="mr-2">
                        Avatar
                    </label>
                    <img src="{{ asset($user->avatar) }}" alt="avatar" height="60px" width="60px" style="border-radius:50%">
                    <input type="file" name="avatar" id="featured" class="form-control-file mt-2">
                </div>

                <div class="form-group">
                    <label for="facebook">Facebook</label>
                    <input type="text" name="facebook" id="facebook" class="form-control" value="{{ $user->profile->facebook }}">
                </div>

                <div class="form-group">
                    <label for="youtube">Youtube</label>
                    <input type="text" name="youtube" id="youtube" class="form-control" value="{{ $user->profile->youtube }}">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">
                            Update Profile
                        </button>
                    </div>
                </div>
          </form>
        </div>
    </div>
@endsection
