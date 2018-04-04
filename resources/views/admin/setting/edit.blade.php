@extends('layouts.app')

@section('content')
    @include('includes.errors')

    <div class="card">
        <div class="card-header">
          Edit Settings
        </div>
        <div class="card-body">
          <form action="{{route('settings.update')}}" method="post">
                @csrf
                
                <div class="form-group">
                    <label for="name">Site Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $settings->site_name }}">
                </div>
                
                <div class="form-group">
                    <label for="number">Contact Number</label>
                    <input type="text" name="number" id="number" class="form-control" value="{{ $settings->contact_number }}">
                </div>

                <div class="form-group">
                    <label for="email">Contact Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $settings->contact_email }}">
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control" value="{{ $settings->address }}">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">
                            Update Settings
                        </button>
                    </div>
                </div>
          </form>
        </div>
    </div>
@endsection
