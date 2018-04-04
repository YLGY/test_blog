@extends('layouts.app')

@section('content')
    <div class="card">
        <h5 class="card-header">Post</h5>
        <table class="table table-hover text-center card-body">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Edit</th>
                    <th>Trash</th>
                </tr>
            </thead>
            <tbody>
                @if ($posts->count() > 0)
                    @foreach ($posts as $post)
                        <tr>
                            <td class="align-middle">
                                <img src="{{ asset($post->featured) }}" alt="post title" height="50px" width="50px">
                            </td>
                            <td class="align-middle">
                                {{$post->title}}
                            </td>
                            <td class="align-middle">
                                <a href="{{ route('posts.edit', ['id' => $post->id]) }}" class="btn btn-info">Edit</a>
                            </td>
                            <td class="align-middle">
                                <form action="{{ route('posts.destroy', ['id' => $post->id]) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Trash</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <th class="text-center" colspan="5">
                            No Post Yet
                        </th>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection