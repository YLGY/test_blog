@extends('layouts.app')

@section('content')
    <div class="card">
        <h5 class="card-header">Post</h5>
        <table class="table table-hover text-center card-body">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Permisions</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @if ($users->count() > 0)
                    @foreach ($users as $user)
                        <tr>
                            <td class="align-middle">
                                <img src="{{ asset($user->avatar) }}" alt="user avatar" width="60px" height="60px" style="border-radius: 50%">
                            </td>
                            <td class="align-middle">
                                {{ $user->name }}
                            </td>
                            <td class="align-middle">
                                @if ($user->admin == 1)
                                    <a href="{{ route('users.not.admin', ['id' => $user->id]) }}" class="btn btn-danger">Remove Permission</a>
                                @else
                                    <a href="{{ route('users.admin', ['id' => $user->id]) }}" class="btn btn-success">Make Admin</a>
                                @endif
                            </td>
                            <td class="align-middle">
                                <form action="{{ route('users.destroy', ['id' => $user->id]) }}" class="d-inline" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger" type="submit" 
                                        @if (Auth::id() === $user->id)
                                            disabled
                                        @endif
                                    >Delete</button>
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