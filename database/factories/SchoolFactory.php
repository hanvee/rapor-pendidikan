<?php

namespace Database\Factories;

use App\Models\Subdistrict;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\School>
 */
class SchoolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $subdistrict_id = Subdistrict::all()->pluck('id')->toArray();

        return [
            'name' => $this->faker->company(),
            'address' => $this->faker->streetAddress(),
            'subdistrict_id' => $this->faker->randomElement($subdistrict_id)
        ];
    }
}
