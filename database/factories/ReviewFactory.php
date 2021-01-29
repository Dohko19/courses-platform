<?php
namespace Database\Factories;

use App\Models\Category;
use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Review::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'course_id' => Category::all()->random()->id,
            'rating' => $this->faker->randomFloat(2, 1, 5)
        ];
    }
}

