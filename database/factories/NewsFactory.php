<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(5),
            'image_url' => 'https://www.dummyimage.com/600x400/'.
                ltrim($this->faker->hexColor(),"#").'/'.
                ltrim($this->faker->hexColor(),"#"),
            'source_id' => \App\Models\NewsSource::factory(),
            'original_link' => $this->faker->url(),
        ];
    }
}
