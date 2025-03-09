<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index() {
        $comments = Comment::all();
        return view('comments.list', ['comments' => $comments]);
    }
    public function store() {
        $comment = Comment::create([
            'content' => request()->content,
            'commentable_id' => request()->commentable_id,
            'commentable_type' => request()->commentable_type,
        ]);
        return to_route('posts.show', ['post' => $comment->commentable_id]);        
    }

    public function destroy($id) {
        $comment = Comment::find($id);
        $commentable_id = $comment->commentable_id;
        $comment->delete();
        return to_route('posts.show', ['post' => $commentable_id]);
    }

    public function update($id) {
        $comment = Comment::find($id);
        $comment->update([
            'content' => request()->content,
        ]);
        return to_route('posts.show', ['post' => $comment->commentable_id]);
    }

    public function updateAjax($id) {
        $comment = Comment::find($id);
        $comment->update([
            'content' => request()->content,
        ]);
        return response()->json(['success' => true]);
    }

    public function edit($id) {
        $comment = Comment::find($id);
        return view('comments.edit', ['comment' => $comment]);
    }

    public function create() {
        return view('comments.create');
    }

}
