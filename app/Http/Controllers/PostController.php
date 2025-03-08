<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = [
            ['id' => 1, 'title' => "title 1", 'description' => "this is description 1", 'posted_by' => ['name' => "dina"], 'created_at' => "2020-02-12"],
            ['id' => 2, 'title' => "title 2", 'description' => "this is description 2", 'posted_by' => ['name' => "test"], 'created_at' => "2020-02-12"],
        ];
        return view('posts.index', ['posts' => $posts]);
    }

    public function create() {
        return view('posts.create');
    }

    public function show($id) {   
        $post = ['id' => 1, 'title' => "title 1", 'description' => "this is description 1", 'posted_by' => ['name' => "dina", "email" => "dina@test.com", "created_at" => "2020-02-12"], 'created_at' => "2020-02-12"];
        return view('posts.show', ['post' => $post]);
    }

    public function store() {   
        // var_dump(request()->all());    
        return to_route('posts.index');
    }

    
}
