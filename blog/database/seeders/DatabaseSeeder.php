<?php

namespace Database\Seeders;

use \App\Models\User;
use \App\Models\Category;
use \App\Models\Post;
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

        /*User::truncate();
        Category::truncate();
        Post::truncate();*/
        /*$user = User::factory()->create([
            'name' => 'Bradley Owens'
        ]);*/

        Post::factory(15)->create(/*[
            'user_id' => $user->id
        ]*/);
        /* $user = User::factory()->create();

       $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        $family = Category::create([
            'name' => 'Family',
            'slug' => 'family'
        ]);

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $family->id,
            'title' => 'My First Post',
            'slug' => 'my-first-post',
            'excerpt' => '<p>This is an excerpt for my first post.</p>',
            'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin rhoncus urna sed accumsan mollis. Aenean volutpat posuere est, eget ullamcorper lorem mattis tempor. Phasellus congue suscipit ante vehicula tincidunt. Praesent non imperdiet arcu. Cras fermentum eu dolor ac hendrerit. Nullam quis maximus orci. Donec vel felis et ipsum tincidunt efficitur nec nec dolor. Vivamus porta malesuada vestibulum.</p>',
        ]);
        Post::create([
            'user_id' => $user->id,
            'category_id' => $work->id,
            'title' => 'My Second Post',
            'slug' => 'my-second-post',
            'excerpt' => '<p>This is an excerpt for my second post.</p>',
            'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin rhoncus urna sed accumsan mollis. Aenean volutpat posuere est, eget ullamcorper lorem mattis tempor. Phasellus congue suscipit ante vehicula tincidunt. Praesent non imperdiet arcu. Cras fermentum eu dolor ac hendrerit. Nullam quis maximus orci. Donec vel felis et ipsum tincidunt efficitur nec nec dolor. Vivamus porta malesuada vestibulum.</p>',
        ]);
        Post::create([
            'user_id' => $user->id,
            'category_id' => $personal->id,
            'title' => 'My Third Post',
            'slug' => 'my-third-post',
            'excerpt' => '<p>This is an excerpt for my third post.</p>',
            'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin rhoncus urna sed accumsan mollis. Aenean volutpat posuere est, eget ullamcorper lorem mattis tempor. Phasellus congue suscipit ante vehicula tincidunt. Praesent non imperdiet arcu. Cras fermentum eu dolor ac hendrerit. Nullam quis maximus orci. Donec vel felis et ipsum tincidunt efficitur nec nec dolor. Vivamus porta malesuada vestibulum.</p>',
        ]);*/
    }
}
