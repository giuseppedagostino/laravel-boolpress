<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Image;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 6; $i++) { 
            $newImage = new Image();

            $newImage->alt = $faker->sentence(3);
            // MODIFICARE IL FILE PER L'INCLUSIONE DELLE IMMAGINI
            $newImage->link = $faker->imageUrl(640, 480, 'animals');
            $newImage->caption = $faker->sentence(10);

            $newImage->save();
        }
    }
}
