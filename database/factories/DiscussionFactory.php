<?php

namespace Database\Factories;

use App\Models\Discussion;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class DiscussionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Discussion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'category' => $this->faker->word,
            'summery' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'slug' => $this->faker->slug,
            'user_id' => '1'
        ];
    }
}
