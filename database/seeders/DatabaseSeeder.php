<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Admin::factory()->create();
        Post::factory(30)->create();
        Category::factory(30)->create();
        Tag::factory(8)->create(); // Create 8 tags

        foreach (Post::all() as $post){
            $random_tags= Tag::all()->random(rand(2,5))->pluck('id')->toArray();
            foreach ($random_tags as $tag){
                DB::table('post_tag')->insert([
                    'post_id' => $post->id,
                    'tag_id'=> Tag::all()->random(1)[0]->id
                ]);
            }
        }

        foreach (Category::all() as $category){
            $random_posts= Post::all()->random(rand(2,5))->pluck('id')->toArray();
            foreach ($random_posts as $post){
                DB::table('category_post')->insert([
                    'category_id' => $category->id,
                    'post_id'=> Post::all()->random(1)[0]->id
                ]);
            }
        }
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
