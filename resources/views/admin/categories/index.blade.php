@extends('layouts.app')

@section('content')
    <div class="card">
        <h5 class="card-header">Category</h5>
        <table class="table table-hover text-center card-body">
            <thead>
                <tr>
                    <th>Category Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @if ($categories->count() > 0)
                    @foreach ($categories as $category)
                        <tr>
                            <td>
                                {{$category->name}}
                            </td>
                            <td>
                                <a href="{{ route('categories.edit', ['id' => $category->id]) }}" class="btn btn-info">
                                    Edit
                                </a>
                            </td>
                            <td>
                            <form action="{{ route('categories.destroy', ['id' => $category->id]) }}" method="post" class="d-inline">
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
                            No Category Yet
                        </th>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection