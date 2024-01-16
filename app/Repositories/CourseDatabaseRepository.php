<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Database\Eloquent\Collection;

class CourseDatabaseRepository implements CourseDatabaseRepositoryInterface
{
    public function getShowCourse(): Collection
    {
        return Course::select('id', 'name', 'description')->get();
    }

    public function getCourseForShowStudentsOnCourse(int $courseFromButton): ?Course
    {
        return Course::find($courseFromButton);
    }

    public function getStudentsForShowStudentsOnCourse(Course $course): Collection
    {
        return $course->students()->select('students.id', 'students.first_name', 'students.last_name')->get();
    }

    public function getCourseWithId(int|string $courseId): ?Course
    {
        return Course::find($courseId);
    }

    public function getStudentWithId(int|string $studentId): ?Student
    {
        return Student::find($studentId);
    }

    public function deleteForRemoveStudentFromCourse(Course $course, int|string $studentId): void
    {
        $course->students()->detach($studentId);
    }

    public function getAllStudents(): Collection
    {
        return Student::all();
    }

    public function getEnrolledStudents(Course $course): Collection
    {
        return $course->students;
    }

    public function getDiffStudents(Collection $allStudents, Collection $enrolledStudents): Collection
    {
        return $allStudents->diff($enrolledStudents)->sortBy('first_name');
    }

    public function writeStudentToCourse(Course $course, Student $student): void
    {
        $course->students()->attach($student);
    }
}