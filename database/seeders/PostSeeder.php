<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB; 
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();

        foreach (range(1, 200) as $index)  {
            DB::table('posts')->insert([
                'post_title' => $faker->city,
                'post_detail' => $faker->paragraph($nb =2),
                'visitors'=> $faker->numberBetween($min = 100, $max = 1000),
            ]);
        }

    }
}


