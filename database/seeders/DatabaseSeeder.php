<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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
        // Category::factory(5)->create();

        User::create([
            'name' => 'Wawal Wiguna',
            'username' => 'wawaaal',
            'email' => 'wawal.wiguna@gmail.com',
            'password' => bcrypt('Kucingl1aw')
        ]);

        User::factory(10)->create();
        Post::factory(20)->create();

        Category::create([
            'name' => 'Programming',
            'slug' => 'programming'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);

        Category::create([
            'name' => 'Entertainment',
            'slug' => 'entertainment'
        ]);

        Category::create([
            'name' => 'Technologies',
            'slug' => 'technologies'
        ]);
    }
}
