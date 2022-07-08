<?php

namespace Database\Factories;

use App\Models\School;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $school_id = School::all()->pluck('id')->toArray();

        return [
            'school_id' => $this->faker->randomElement($school_id),
            'indicator_number' => $this->faker->randomDigit(), 
            'indicator_name' => $this->faker->sentence(1, 5),
            'indicator_detail' => $this->faker->sentence(5, 20),
            'score' => $this->faker->randomNumber(2, true),
            'similar_national' => $this->faker->randomNumber(2, true),
            'average_city' => $this->faker->randomNumber(2, true),
            'average_province' => $this->faker->randomNumber(2, true),
            'average_national' => $this->faker->randomNumber(2, true),
            'achievement_point' => $this->faker->sentence(1, 5),
            'achievement_point_detail' => $this->faker->sentence(5, 20),
            'score_range' => $this->faker->numberBetween(0, 100),
            'level' => mt_rand(1, 5),
            'created_at' => $this->faker->dateTime()
        ];
    }
}
