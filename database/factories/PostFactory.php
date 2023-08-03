<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
                    'post_title' => fake()->sentence(6),
                    'post_detail' => fake()->paragraph(1),
        ];
    }

    // $faker= Faker::create();

    //     foreach (range(1,100) as $index){
    //         Article::create([
    //             'title'=>$faker->sentence(6),
    //             'description'=>$faker->paragraph(1),
    //         ]);
    //     }

}
