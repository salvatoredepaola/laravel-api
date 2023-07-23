<?php

namespace Database\Seeders;

use App\Models\Technology;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categories = Category::all(["id"]);
        $technologies = Technology::all(["id"]);

        for ($i=0; $i < 10 ; $i++) { 
            $post = new Post();
            $post->title = $faker->words(3, true);
            $post->content = $faker->text(500);
            $post->image = "placeholders/placeholder.png";
            $post->category_id = $categories->random()->id;
            
            $post->save();

            $techNum = rand(0,5);
            $postTech = [];
            for ($x=0; $x < $techNum; $x++) {
                $postTech[] = $technologies->random()->id;
            }
            
            $post->technologies()->attach(array_unique($postTech));

        }
    }
}
