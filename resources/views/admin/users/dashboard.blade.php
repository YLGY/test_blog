@extends('layouts.app')

@section('content')

    <div class="row text-center">
        <div class="col-sm-3 mb-3">
            <div class="card">
                <div class="card-header bg-success">Posts</div>

                <div class="card-body">
                    {{ $posts_count }}
                </div>
            </div>
        </div>

        <div class="col-sm-3 mb-3">
            <div class="card">
                <div class="card-header bg-danger">Trashed</div>

                <div class="card-body">
                    {{ $trashed_count }}
                </div>
            </div>
        </div>

        <div class="col-sm-3 mb-3">
            <div class="card">
                <div class="card-header bg-info">Users</div>

                <div class="card-body">
                    {{ $users_count }}
                </div>
            </div>
        </div>

        <div class="col-sm-3 mb-3">
            <div class="card">
                <div class="card-header bg-info">Category</div>

                <div class="card-body">
                    {{ $category_count }}
                </div>
            </div>
        </div>

        <div class="col-sm-3 mb-3">
            <div class="card">
                <div class="card-header bg-info">Tags</div>

                <div class="card-body">
                    {{ $tags_count }}
                </div>
            </div>
        </div>
    </div>
            
@endsection
