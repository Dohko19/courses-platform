<?php

use App\Models\Category;
use App\Models\Course;
use App\Models\Goal;
use App\Models\Level;
use App\Models\Requirement;
use App\Models\Role;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	Storage::deleteDirectory('courses');
    	Storage::deleteDirectory('users');
    	Storage::makeDirectory('users');
    	Storage::makeDirectory('courses');

    	Role::factory()->count(1)->create(['name' => 'admin']);
    	Role::factory()->count(1)->create(['name' => 'teacher']);
    	Role::factory()->count(1)->create(['name' => 'student']);

    	User::factory()->count(1)->create([
    		'name' => 'admin',
    		'email' => 'admin@email.com',
    		'password' => bcrypt('123123'),
    		'role_id' => Role::ADMIN,
    	])->each(function(User $u){
    		Student::factory()->count(1)->create(['user_id' => $u->id]);
    	});

        User::factory()->count(50)->create()
		    	->each(function(User $u){
                    Student::factory()->count(1)->create(['user_id' => $u->id]);
		    	});

        User::factory()->count(50)->create()
		    	->each(function(User $u){
                    Student::factory()->count(1)->create(['user_id' => $u->id]);
                    Teacher::factory()->count(1)->create(['user_id' => $u->id]);;
		    	});

		    	Level::factory()->count(1)->create(['name' => 'Beginner']);
		    	Level::factory()->count(1)->create(['name' => 'Intermediate']);
		    	Level::factory()->count(1)->create(['name' => 'Advanced']);
		    	Category::factory()->count(5)->create();

        Course::factory()->count(50)->create()
        ->each(function(Course $c){
            $c->goals()->saveMany(Goal::factory()->count(2)->create());
            $c->goals()->saveMany(Requirement::factory()->count(4)->create());
        });
        // $this->call(UsersTableSeeder::class);
    }
}
