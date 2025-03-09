<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function commentable()
    {
        return $this->morphTo();
    }
    protected $fillable = ['content', 'commentable_id', 'commentable_type'];

    // public function post() {
    //     return $this->belongsTo(Post::class);
    // }
}
