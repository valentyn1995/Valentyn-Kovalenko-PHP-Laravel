<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        Course::truncate();

        $courses = [
            'Mathematics',
            'English Language',
            'Science',
            'Geography',
            'History',
            'Chemistry',
            'Physics',
            'Biology',
            'Art',
            'Physical Education'
        ];

        $faker = Faker::create();

        foreach ($courses as $course) {
            
            $randomSentence = $faker->sentence;

            Course::insert([
                'name' => $course,
                'description' => $randomSentence
            ]);
        }
    }
}