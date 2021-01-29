<?php
namespace Database\Factories;

use App\Models\Category;
use App\Models\Requirement;
use Illuminate\Database\Eloquent\Factories\Factory;

class RequirementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Requirement::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'course_id' => Category::all()->random()->id,
            'requirement' => $this->faker->sentence
        ];
    }
}
