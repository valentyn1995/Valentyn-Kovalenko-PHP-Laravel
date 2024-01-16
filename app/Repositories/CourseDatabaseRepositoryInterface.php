<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Database\Eloquent\Collection;

interface CourseDatabaseRepositoryInterface
{
    public function getShowCourse(): Collection;

    public function getCourseForShowStudentsOnCourse(int $courseFromButton): ?Course;

    public function getStudentsForShowStudentsOnCourse(Course $course): Collection;

    public function getCourseWithId(int|string $courseId): ?Course;

    public function getStudentWithId(int|string $studentId): ?Student;

    public function deleteForRemoveStudentFromCourse(Course $course, int|string $studentId): void;

    public function getAllStudents(): Collection;

    public function getEnrolledStudents(Course $course): Collection;

    public function getDiffStudents(Collection $allStudents, Collection $enrolledStudents): Collection;

    public function writeStudentToCourse(Course $course, Student $student): void;
}