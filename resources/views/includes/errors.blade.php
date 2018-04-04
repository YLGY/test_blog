@if ($errors)
    <ul class="list-group mb-1">
        @foreach ($errors->all() as $error)
            <li class="list-group-item text-danger">
                {{$error}}
            </li>
        @endforeach
    </ul>
@endif