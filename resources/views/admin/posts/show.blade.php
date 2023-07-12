@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h1>{{$post->title}}</h1>
            <p>Description: {{$post->content}}</p>
            <p>Category: {{$post->category ? $post->category->name : "Nessuna categoria"}}</p>
            <form action="{{ route("admin.posts.destroy", $post)}}" method="post">
                @csrf
                @method("DELETE")
                <input class="btn btn-danger" type="submit" value="Elimina post">
            </form>
        </div>
        <div class="col">
            <img src="{{$post->image}}" alt="{{$post->title}}">
        </div>
    </div>
</div>
    
@endsection