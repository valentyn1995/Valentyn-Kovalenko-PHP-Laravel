<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Course;
use App\Models\StudentCourse;
use Faker\Factory as Faker;

class StudentCourseSeeder extends Seeder
{
    public function run(): void
    {
        StudentCourse::truncate();

        $faker = Faker::create();

        $studentIds = Student::pluck('id');
        $courseIds = Course::pluck('id');

        foreach ($studentIds as $studentId) {
            $courseCount = rand(1, 3);

            $countCours = $faker->randomElements($courseIds, $courseCount);

            foreach ($countCours as $coursId) {
                StudentCourse::insert([
                    'student_id' => $studentId,
                    'course_id' => $coursId
                ]);
            }
        }
    }
}