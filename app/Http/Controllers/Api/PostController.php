<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

        // $posts = post::all();

        // $posts = Post::with(['technologies', 'category'])->get();

        $posts = Post::with(['technologies', 'category'])->paginate(4);

        return response()->json([
            'success' => true,
            'results' => $posts,
        ]);
    }

    public function show($id) {

        $post = Post::with(['technologies', 'category'])->find($id);

        // $response = [
        //     "sucess" => true,
        //     "results" => $post
        // ];

        // return response()->json($response);

        return response()->json([
            'success' => true,
            'results' => $post,
        ]);

    }
} 
