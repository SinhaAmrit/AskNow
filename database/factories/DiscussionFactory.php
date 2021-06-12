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

    // private function uniqueSlug($title)
    // {
    //     $slug = Str::of($title)->slug('-')->lower()->ascii();
    //     $count = Discussion::where('slug','LIKE',"{$slug}%")->count();
    //     $newCount = $count > 0 ? ++$count : '';
    //     return $newCount > 0 ? "$slug-$newCount" : $slug;
    // }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'title' => $this->faker->unique()->title,
            'category' => $this->faker->word,
            'summery' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'slug' => Str::of($title)->slug('-')->lower()->ascii(),
            'user_id' => '1'
        ];
    }
}
