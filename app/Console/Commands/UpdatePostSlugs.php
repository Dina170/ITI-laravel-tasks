<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;

class UpdatePostSlugs extends Command
{
    protected $signature = 'posts:update-slugs';
    protected $description = 'Update slugs for all posts based on their titles';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $posts = Post::all();

        foreach ($posts as $post) {
            $post->slug = \Str::slug($post->title);
            $post->save();
        }

        $this->info('Slugs updated successfully.');
    }
}
