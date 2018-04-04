@extends('layouts.app')

@section('content')
    <div class="card">
        <h5 class="card-header">Tag</h5>
        <table class="table table-hover text-center card-body">
            <thead>
                <tr>
                    <th>Tag Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @if ($tags->count() > 0)
                    @foreach ($tags as $tag)
                        <tr>
                            <td>
                                {{$tag->tag}}
                            </td>
                            <td>
                                <a href="{{ route('tags.edit', ['id' => $tag->id]) }}" class="btn btn-info">
                                    Edit
                                </a>
                            </td>
                            <td>
                            <form action="{{ route('tags.destroy', ['id' => $tag->id]) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <th class="text-center" colspan="5">
                            No Tag Yet
                        </th>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection