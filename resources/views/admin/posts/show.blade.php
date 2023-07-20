@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row my-4">
        <div class="col">
            <h1>{{$post->title}}</h1>
            <h3>Category: {{$post->category ? $post->category->name : "Nessuna categoria"}}</h3>
            <p>Technologies:</p>
            @forelse ($post->technologies as $item)
                <ul>
                    <li>{{$item->name}}</li>
                </ul>
            @empty
            <p>Technologies:<span class="text-secondary">N/A</span></p>
            @endforelse
            <p>Description: {{$post->content}}</p>
            <form action="{{ route("admin.posts.destroy", $post)}}" method="post">
                @csrf
                @method("DELETE")
                <input class="btn btn-danger" type="submit" value="Elimina post">
            </form>
        </div>
        <div class="col">
            @if ($post->image)
            <img src="{{ asset('/storage') .'/' . $post->image }}" alt="{{$post->title}}">
            @else
            <img src="https://t3.ftcdn.net/jpg/02/48/42/64/360_F_248426448_NVKLywWqArG2ADUxDq6QprtIzsF82dMF.jpg" alt="{{$post->title}}">                
            @endif
        </div>
    </div>
</div>
    
@endsection