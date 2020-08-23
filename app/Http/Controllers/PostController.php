<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function addPost()
    {
        return view('post.add-post');
    }

    public function createPost(Request $req)
    {
        $post = new Post();
        $post->title = $req->title;
        $post->description = $req->description;

        $post->save();

        return "A post has been added successfully";

    }

    public function allPosts()
    {
        $posts = Post::all();

        return view('post.all-posts', ['posts' => $posts]);
    }
}
