<?php
namespace Database\Factories;

use App\Models\Category;
use App\Models\Course;
use App\Models\Level;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Provider\Image;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $name = $this->faker->sentence;
        $status = $this->faker->randomElement([Course::PENDING, Course::REJECTED]);
        return [
            'teacher_id' => Teacher::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'level_id' => Level::all()->random()->id,
            'name' => $name,
            'slug' => Str::slug($name, '-'),
            'description' => $this->faker->paragraph,
            'picture' => Image::image(storage_path() . '/app/public/courses', 600, 300, 'business', false),
            'status' => $status,
            'previous_approved' => $status !== Course::PUBLISHED ? false : true,
            'previous_rejected' => $status !== Course::REJECTED,
        ];
    }
}

