<?php 

declare(strict_types=1);

namespace App\Repositories;
use App\Models\Group;
use App\Models\Student;

interface StudentDatabaseRepositoryInterface
{
    public function updateOrCreateGroup($request): ?Group;

    public function createStudent($request, Group|null $group): ?Student;
    
    public function deleteFromStudentCourse(int|string $id): int;

    public function deleteStudent(int|string $id): int;
}