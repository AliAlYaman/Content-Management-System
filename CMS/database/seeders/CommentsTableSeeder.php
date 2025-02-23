<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::all();

        // Create 5 comments for each post
        $posts->each(function ($post) {
            Comment::factory()
                ->count(5) // Create 5 comments per post
                ->for($post) // Associate the comments with the post
                ->create();
        });
    }
}
