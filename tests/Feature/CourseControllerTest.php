<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Course;
use App\Models\Student;
use Database\Seeders\StudentSeeder;
use Database\Seeders\GroupSeeder;
use Database\Seeders\StudentCourseSeeder;
use Database\Seeders\CourseSeeder;

class CourseControllerTest extends TestCase
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

    public function testShowGroup(): void
    {
        $response = $this->get('/course/showCourse');

        $response->assertStatus(200);
        $response->assertViewIs('course.show');
    }

    public function testShowStudentsOnCourse(): void
    {
        $course = Course::inRandomOrder()->first();

        $response = $this->get('/course/show_students_on_course/' . $course->id);

        $response->assertStatus(200);
        $response->assertViewIs('course.showStudents');
    }

    public function testRemoveStudentFromCourse(): void
    {
        $course = Course::inRandomOrder()->first();
        $student = Student::inRandomOrder()->first();

        $course->students()->attach($student);

        $response = $this->delete('/course/' . $course->id . '/remove_student/' . $student->id);

        $response->assertStatus(302);

        $this->assertDatabaseMissing('student_courses', [
            'course_id' => $course->id,
            'student_id' => $student->id
        ]);
    }

    public function testShowAllStudentsWithoutCourse(): void
    {
        $course = Course::inRandomOrder()->first();

        $response = $this->get('course/show_all_students_without_course/' . $course->id);

        $response->assertStatus(200);
        $response->assertViewIs('course.showAllStudentsWithoutCourse');
    }

    public function testStoreStudentToCourse(): void
    {
        $course = Course::inRandomOrder()->first();
        $student = Student::inRandomOrder()->first();

        $response = $this->post('/course/' . $course->id . '/add_student_to_course/' . $student->id);

        $response->assertStatus(302);
        $this->assertDatabaseHas('student_courses', [
            'course_id' => $course->id,
            'student_id' => $student->id
        ]);
    }
}