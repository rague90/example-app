<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->realText($maxNbChars = 100, $indexSize = 2);
        return [
            
            //
            'title' => $title,
            'slug' => Str::slug($title),
            'body' => $this->faker->text(),
            'image' => $this->faker->imageUrl(640,480),
             
        ];
    }
}
