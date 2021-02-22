<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;
// includo il namespace della classe stringa
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) { 
            $newPost = new Post();

            $newPost->title = $faker->word(3);
            // aggiungo lo slug trasformando il titolo
            $newPost->slug = Str::slug($newPost->title);
            $newPost->subtitle = $faker->sentence(7);
            $newPost->author = $faker->name();
            $newPost->content = $faker->text(300);
            $newPost->publication_date = $faker->date();

            $newPost->save();
        }
    }
}
