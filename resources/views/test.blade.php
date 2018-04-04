@extends('layouts.app')

@section('content')
<div class="col-lg-3">
        <ul class="list-group">
            <li class="list-group-item">
                <a href="{{route('home')}}">Home</a>
            </li>
            <li class="list-group-item">
                <a data-toggle="collapse" href="#posts" role="button" aria-expanded="false" aria-controls="posts">
                    Post >>
                </a>
            </li>
            <div class="collapse" id="posts">
                <li class="list-group-item pl-5">
                    <a href="{{route('posts.index')}}">Post List</a>
                </li> 
                <li class="list-group-item pl-5">
                    <a href="{{route('posts.create')}}">Create New Post</a>
                </li>
                <li class="list-group-item pl-5">
                    <a href="{{route('posts.trashed')}}">Trashed Post</a>
                </li>
            </div>
            <li class="list-group-item">
                <a data-toggle="collapse" href="#categories" role="button" aria-expanded="false" aria-controls="posts">
                    Post >>
                </a>
            </li>
            <div class="collapse" id="categories">
                <li class="list-group-item pl-5">
                    <a href="{{route('categories.create')}}">Add new category</a>
                </li>
                <li class="list-group-item pl-5">
                    <a href="{{route('categories.index')}}">Category List</a>
                </li>
            </div>
            
            
        </ul>
</div>
@endsection
