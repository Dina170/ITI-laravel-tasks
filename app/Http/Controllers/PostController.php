<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;

use Inertia\Inertia;

class PostController extends Controller
{
    public function index() {
        $posts = Post::with('user')->paginate(10); 
        return Inertia::render('Posts/ListPosts', [
            'posts' => $posts,
        ]);
        // return view('posts.index', ['posts' => $posts]);
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

    public function show_json($id) {   
        $post = Post::with('user')->find($id);
        // return view('posts.show', ['post' => $post]);
        return response()->json($post);
    }

    public function store(StorePostRequest $request) {  
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = null;
        }

        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->posted_by,
            'image' => $imagePath,
        ]);  
        return to_route('posts.show', ['post' => $post->id]);
    }

    public function update(StorePostRequest $request, $id) {   
        $post = Post::find($id);

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = $post->image;
        }

        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->posted_by,
            'image' => $imagePath,
        ]);
        return to_route('posts.show', ['post' => $post->id]);
    }

    public function destroy($id) {   
        $post = Post::find($id);
        if ($post->image) { 
            Storage::disk('public')->delete($post->image);
        }
    
        $post->delete();
        return to_route('posts.index');
    }
}
