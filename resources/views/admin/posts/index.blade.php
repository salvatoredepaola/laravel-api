@extends('layouts.admin')

@section('content')
<div class="row row-cols-1 row-cols-md-3 g-4 mt-4">
    @foreach ($posts as $post)
    <div class="col">
      <div class="card h-100">
        <img src="{{$post->image}}" class="card-img-top" alt="{{$post->title}}">
        <div class="card-body">
          <h5 class="card-title">{{$post->title}}</h5>
          {{-- <p class="card-text">{{$post->content}}</p> --}}
          <a href="{{ route("admin.posts.show", $post)}}" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
    @endforeach
    
@endsection