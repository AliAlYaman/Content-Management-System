<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        // Create 10 posts for each user
        $users->each(function ($user) {
            Post::factory()->count(10)->create([
                'user_id' => $user->id,
            ]);
        });
    }
}
