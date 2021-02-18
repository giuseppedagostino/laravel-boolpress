<?php

use Illuminate\Database\Seeder;
use App\Comment;
use App\Post;
use Faker\Generator as Faker;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::all();

        foreach ($posts as $post) {

            for ($i=0; $i < 2; $i++) { 

                $newComment = new Comment();

                $newInfoPost->post_id = $post->id;
                $newComment->author = $faker->name();
                $newComment->comment_text = $faker->text(150);
                $newComment->created_at = dateTime();
                $newComment->updated_at= dateTime();

                $newInfoPost->save();
                
            }
            
        }
    }
}
