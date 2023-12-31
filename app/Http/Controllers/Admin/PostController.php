<?php

namespace App\Http\Controllers\Admin;

use App\http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\ContactRequest;
use App\Models\Technology;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view("admin.posts.index", compact('posts') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        $technologies = Technology::all();

        return view("admin.posts.create", compact('categories','technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            // $img_path = $data["image"]->store("uploads");
            $img_path = Storage::put('uploads', $data['image']);
    
            $data['image'] = $img_path;
        }

        // dump($data);

        $newPost = new Post();
        $newPost->fill($data);
        $newPost->save();


        if ($request['technologies']){
            $newPost->technologies()->attach( $data["technologies"] );
        }


        return to_route("admin.posts.show", $newPost);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view("admin.posts.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->validated();

        $post->update($data);

        //Eliminiamo il collegamento con eventuali tags e poi lo ricreiamo
        // $post->tags()->detach();
        // $post->tags()->attach( $data->tags );

        $post->technologies()->sync( $data->technologies );


        return to_route("admin.posts.show", $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        
        return redirect()->route("admin.posts.index");
    }
}
