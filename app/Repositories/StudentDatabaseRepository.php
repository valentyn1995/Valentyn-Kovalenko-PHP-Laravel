<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Group;
use App\Models\Student;
use App\Models\StudentCourse;

class StudentDatabaseRepository implements StudentDatabaseRepositoryInterface
{
    public function updateOrCreateGroup($request): ?Group
    {
        return Group::updateOrCreate([
            'name' => $request->input('group_name')
        ]);
    }

    public function createStudent($request, Group|null $group): ?Student
    {
        return Student::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'group_id' => $group->id,
        ]);
    }

    public function deleteFromStudentCourse(int|string $id): int
    {
        return StudentCourse::where('student_id', $id)->delete();
    }

    public function deleteStudent(int|string $id): int
    {
        return Student::where('id', $id)->delete();
    }
}