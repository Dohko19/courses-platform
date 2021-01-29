<?php
namespace Database\Factories;

use App\Models\Goal;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class GoalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Goal::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'course_id' => Category::all()->random()->id,
            'goal' => $this->faker->sentence
        ];
    }
}

