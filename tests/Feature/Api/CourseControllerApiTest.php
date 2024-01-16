<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Database\Seeders\CourseSeeder;
use App\Models\Course;
use App\Models\Student;
use Database\Seeders\StudentSeeder;
use Database\Seeders\GroupSeeder;
use Database\Seeders\StudentCourseSeeder;

class CourseControllerApiTest extends TestCase
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

    public function testShowGroupApiJson(): void
    {
        $response = $this->get('/api/v1/course/showCourse?format=json');

        $response->assertStatus(200)
            ->assertHeader('Content-Type', 'application/json');
    }

    public function testShowGroupApiXml(): void
    {
        $response = $this->get('/api/v1/course/showCourse?format=xml');

        $response->assertStatus(200)
            ->assertHeader('Content-Type', 'application/xml; charset=utf-8');
    }

    public function testShowStudentsOnCourseApiJson(): void
    {
        $course = Course::inRandomOrder()->first();

        $response = $this->get('/api/v1/course/show_students_on_course/' . $course->id . '?format=json');

        $response->assertStatus(200)
            ->assertHeader('Content-Type', 'application/json');
    }

    public function testShowStudentsOnCourseApiXml(): void
    {
        $course = Course::inRandomOrder()->first();

        $response = $this->get('/api/v1/course/show_students_on_course/' . $course->id . '?format=xml');

        $response->assertStatus(200)
            ->assertHeader('Content-Type', 'application/xml; charset=utf-8');
    }

    public function testRemoveStudentFromCourseApi(): void
    {
        $course = Course::inRandomOrder()->first();
        $student = Student::inRandomOrder()->first();

        $course->students()->attach($student);

        $response = $this->get('/api/v1/course/' . $course->id . '/remove_student/' . $student->id);

        $response->assertStatus(204);

        $this->assertDatabaseMissing('student_courses', [
            'course_id' => $course->id,
            'student_id' => $student->id
        ]);
    }

    public function testShowAllStudentsWithoutCourseApiJson(): void
    {
        $course = Course::inRandomOrder()->first();

        $response = $this->get('/api/v1/course/show_all_students_without_course/' . $course->id . '?format=json');

        $response->assertStatus(200)
            ->assertHeader('Content-Type', 'application/json');
    }

    public function testShowAllStudentsWithoutCourseApiXml(): void
    {
        $course = Course::inRandomOrder()->first();

        $response = $this->get('/api/v1/course/show_all_students_without_course/' . $course->id . '?format=xml');

        $response->assertStatus(200)
            ->assertHeader('Content-Type', 'application/xml; charset=utf-8');
    }

    public function testStoreStudentToCourseApi(): void
    {
        $course = Course::inRandomOrder()->first();
        $student = Student::inRandomOrder()->first();

        $response = $this->get('/api/v1/course/' . $course->id . '/add_student_to_course/' . $student->id);

        $response->assertStatus(204);

        $this->assertDatabaseHas('student_courses', [
            'course_id' => $course->id,
            'student_id' => $student->id
        ]);
    }
}