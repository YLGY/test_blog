@extends('layouts.app')

@section('content')
    <div class="card">
        <h5 class="card-header">Trashed</h5>
        <table class="table table-hover text-center card-body">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Edit</th>
                    <th>Restore</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @if (count($posts) > 0)
                    @foreach ($posts as $post)
                        <tr>
                            <td class="align-middle">
                                <img src="{{ asset($post->featured) }}" alt="post title" height="50px" width="50px">
                            </td>
                            <td class="align-middle">
                                {{$post->title}}
                            </td>
                            <td class="align-middle">
                                Edit
                            </td>
                            <td class="align-middle">
                                <a href="{{ route('posts.restore', ['id' => $post->id]) }}" class="btn btn-success btn-sm">Restore</a>
                            </td>
                            <td class="align-middle">
                                <a href="{{ route('posts.kill', ['id' => $post->id]) }}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <th class="text-center" colspan="5">
                            No Trashed Post
                        </th>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection