@extends('layouts.admin')

@section('content')
<div class="row row-cols-1 row-cols-md-3 g-5 mt-4">
    @foreach ($posts as $post)
    <div class="col">
      <div class="card border-0  my_shadow h-100">
        @if ($post->image)
        <img src={{ asset("storage/" . $post->image) }} class="card-img-top" alt="{{$post->title}}">
        @else
        <img src="https://t3.ftcdn.net/jpg/02/48/42/64/360_F_248426448_NVKLywWqArG2ADUxDq6QprtIzsF82dMF.jpg" alt="{{$post->title}}">                
        @endif
        <div class="card-body">
          <h5 class="card-title">{{$post->title}}</h5>
          {{-- <p class="card-text">{{$post->content}}</p> --}}
          <a href="{{ route("admin.posts.show", $post)}}" class=" btn  my_shadow">More</a>
        </div>
      </div>
    </div>
    @endforeach
    
@endsection