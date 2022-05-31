<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Category::factory()->create(['name' => 'General', 'slug' => 'general']);
        Category::factory()->create(['name' => 'Laravel', 'slug' => 'laravel']);
        Category::factory()->create(['name' => 'Blade', 'slug' => 'blade']);
        Category::factory()->create(['name' => 'Vue', 'slug' => 'vue']);
        Category::factory()->create(['name' => 'Reactjs', 'slug' => 'reactjs']);
        Category::factory()->create(['name' => 'Flutter', 'slug' => 'flutter']);
        Category::factory()->create(['name' => 'Nodejs', 'slug' => 'nodejs']);
        Category::factory()->create(['name' => 'Golang', 'slug' => 'golang']);
        Category::factory()->create(['name' => 'Livewire', 'slug' => 'livewire']);
        Category::factory()->create(['name' => 'Intertia', 'slug' => 'intertia']);

        $admin = User::factory()->create([
            'name' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@exmple.com',
            'password' => bcrypt('secret'),
            'type' => User::ADMIN,
        ]);

        $moderator = User::factory()->create([
            'name' => 'Moderator',
            'username' => 'moderator',
            'email' => 'moderator@exmple.com',
            'password' => bcrypt('secret'),
            'type' => User::MODERATOR,
        ]);

        $user1 = User::factory()->create();

        for($i = 1; $i <= 11; $i++){
            $post1 = Post::factory()->create([
                'user_id' => $user1->id,
                'category_id' => rand(1, 10),
                'published_at' => now(),
                'views_count' => rand(1,999),
            ]);

            $post1->like($user1);
        }

        $user2 = User::factory()->create();

        for($i = 1; $i <= 11; $i++){
            $post2 = Post::factory()->create([
                'user_id' => $user2->id,
                'category_id' => rand(1, 10),
                'published_at' => now(),
                'views_count' => rand(1,999),
            ]);

            $post2->like($user2);
            $post2->like($user1);
        }

        User::factory(20)->create();

        for($i = 1; $i <= 100; $i++){
            $post = Post::factory()->create([
                'user_id' => rand(3, 24),
                'category_id' => rand(1, 10),
                'published_at' => now(),
                'views_count' => rand(1,999),
            ]);

            $user = User::find(rand(1,24));
            $post->like($user);
        }

        for($i = 1; $i <= 50; $i++){
            Comment::factory()->create([
                'user_id' => rand(3, 24),
                'post_id' => rand(1, 22),
                'spam_reports' => rand(0, 20),
            ]);
        }

        for($i = 1; $i <= 24; $i++){
            Profile::factory()->create([
                'user_id' => $i,
                'twitter' => 'd3215k'
            ]);
        }
    }
}
