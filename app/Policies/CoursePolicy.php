<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
{
    use HandlesAuthorization;

    public function opt_for_course(User $user, Course $course)
    {
        return !$user->teacher || $user->teacher->id !== $course->teacher_id;
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function subscribe(User $user)
    {
        return $user->role_id !== Role::ADMIN && !$user->subscribed('main');
    }

    public function inscribe(User $user, Course $course)
    {
        return !$course->students->contains($user->student->id);
   }
}
