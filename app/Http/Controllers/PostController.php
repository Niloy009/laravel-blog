<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function addPost()
    {
        return view('post.add-post');
    }

    public function createPost(Request $req)
    {
        //dd($req->all());
        $post = new Post();
        $post->title = $req->title;
        $post->description = $req->description;
        $post->user_id = Auth::id();

        if ($req->has('image')) {
            $file = $req->file('image');
            $extension = $file->getClientOriginalExtension(); //getting file extension
            $filename = time() . '.' . $extension;
            $file->move('uploads/', $filename);
            $post->img = $filename;
        }

        $post->save();

        return redirect('/');

    }

    public function allPosts()
    {
        $posts = Post::where('status', 1)->get();


        return view('welcome', ['posts' => $posts]);
    }

    public function singlePost($id)
    {
        $post = Post::where('id', $id)->first();
        // dd(gettype($post));
        return view('post.single-post', compact('post'));
    }

    public function validPost()
    {
        $posts = Post::where('user_id', Auth::id())->get();
        return view('home', compact('posts'));
    }

    public function updatePost(Request $req)
    {
        $post = Post::where('id', $req->id)->first();
        //dd($req->all());
        $post->title = $req->title;
        $post->description = $req->description;
        if ($req->has('image')) {
            $file = $req->file('image');
            $extension = $file->getClientOriginalExtension(); //getting file extension
            $filename = time() . '.' . $extension;
            $file->move('uploads/', $filename);
            $post->img = $filename;
        }

        $post->save();

        return redirect('home');


    }

    public function editPost($id)
    {
        $post = Post::where('id', $id)->first();
        return view('post.update-post', ['post' => $post]);
    }

    public function deletePost($id)
    {

        $post = Post::find($id);


        $file_path = public_path('/uploads/' . $post->img);

        unlink($file_path);
        $post->delete();
        return redirect('home');
    }

    public function statusChange($id)
    {
        $post = Post::where('id', $id)->first();
        if ($post->status == 1) {
            $post->status = 0;
        } else {
            $post->status = 1;
        }
        $post->save();
        return redirect()->back();
    }


}
