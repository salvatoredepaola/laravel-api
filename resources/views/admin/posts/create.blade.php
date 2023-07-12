@extends('layouts.admin')

@section('content')
<div class="container my-3">
    <div class="row g-4 py-4">
        <div class="col">
            <h1>Crea post</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route("admin.posts.store")}}" method="post">
                @csrf

                <label for="title">title</label>
                <input class="form-control" type="text" name="title" id="title">

                <label for="content">content</label>
                <textarea class="form-control" type="text" name="content" id="content"></textarea>

                <label for="image">image</label>
                <input class="form-control" type="text" name="image" id="image">

                <label for="category_id">category</label>
                <select class="form-control" name="category_id" id="category_id">
                    <option value="" selected disabled>Categoria</option>

                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>

                <input class="btn btn-primary form-control my-4" type="submit" value="invia">

            </form>
        </div>
    </div>
</div>
    
@endsection