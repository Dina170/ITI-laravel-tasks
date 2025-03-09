<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        $posts = Post::paginate(10); 
        return view('posts.index', ['posts' => $posts]);
    }

    public function create() {
        $users = User::all();
        return view('posts.create', ['users' => $users]);
    }

    public function edit($id) {
        $post = Post::find($id);
        $users = User::all();

        return view('posts.edit', ['post' => $post, 'users' => $users]);
    }

    public function show($id) {   
        $post = Post::find($id);
        return view('posts.show', ['post' => $post]);
    }

    public function store() {  
        $post = Post::create([
            'title' => request()->title,
            'description' => request()->description,
            'user_id' => request()->posted_by,
        ]);  
        return to_route('posts.show', ['post' => $post->id]);
        // return to_route('posts.index');
    }

    public function update($id) {   
        $post = Post::find($id);
        $post->update([
            'title' => request()->title,
            'description' => request()->description,
            'user_id' => request()->posted_by,
        ]);
        return to_route('posts.show', ['post' => $post->id]);
        // return to_route('posts.index');
    }

    public function destroy($id) {   
        $post = Post::destroy($id);
        return to_route('posts.index');
    }
}
