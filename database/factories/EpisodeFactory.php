<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Episode;
use Illuminate\Database\Eloquent\Factories\Factory;

class EpisodeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Episode::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(12, true),
            'video_url' => 'https://www.youtube.com/embed/aHesi7zh2-M',
            'course_id' => Course::all()->random()->id,
            'duration' => 255
        ];
    }
}
