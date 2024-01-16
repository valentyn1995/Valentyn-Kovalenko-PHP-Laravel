<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Database\Seeders\StudentSeeder;
use Database\Seeders\GroupSeeder;
use Database\Seeders\StudentCourseSeeder;
use Database\Seeders\CourseSeeder;
use Tests\TestCase;
use App\Models\Student;

class StudentControllerApiTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed(GroupSeeder::class);
        $this->seed(CourseSeeder::class);
        $this->seed(StudentSeeder::class);
        $this->seed(StudentCourseSeeder::class);
    }

    public function testStoreStudentApi(): void
    {
        $group_name = "TI-22";
        $first_name = "John";
        $last_name = "Wick";

        $response = $this->post('/api/v1/student/store', [
            'group_name' => $group_name,
            'first_name' => $first_name,
            'last_name' => $last_name
        ]);

        $response->assertStatus(204);

        $this->assertDatabaseHas('groups', [
            'name' => $group_name
        ]);

        $this->assertDatabaseHas('students', [
            'first_name' => $first_name,
            'last_name' => $last_name
        ]);
    }

    public function testDestroyStudentApi(): void
    {
        $student = Student::inRandomOrder()->first();

        $response = $this->delete('/api/v1/student/delete', [
            'id' => $student->id
        ]);

        $response->assertStatus(204);

        $this->assertDatabaseMissing('students', [
            'id' => $student->id
        ]);

        $this->assertDatabaseMissing('student_courses', [
            'student_id' => $student->id
        ]);
    }
}
