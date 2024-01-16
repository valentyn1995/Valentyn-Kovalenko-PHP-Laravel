<?php

declare(strict_types=1);

namespace tests\unit;

use App\Models\Course;
use App\Models\Student;
use App\Models\Group;
use App\Models\StudentCourse;
use Tests\TestCase;

use Illuminate\Foundation\Testing\RefreshDatabase;

class AddStartDataTest extends TestCase
{
    use RefreshDatabase;

    public function testAddStartDataSuccess(): void
    {
        $this->artisan('add:data')->assertExitCode(0);
    }

    public function testDatabaseIsNotEmpty(): void
    {
        $this->artisan('add:data');

        $countStudent = Student::count();
        $countGroup = Group::count();
        $countCourse = Course::count();
        $countStudent_course = StudentCourse::count();

        $this->assertGreaterThan(0, $countStudent);
        $this->assertGreaterThan(0, $countGroup);
        $this->assertGreaterThan(0, $countCourse);
        $this->assertGreaterThan(0, $countStudent_course);
    }
}