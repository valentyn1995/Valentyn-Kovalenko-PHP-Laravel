<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;
use App\Models\Group;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        Student::truncate();

        $faker = Faker::create();

        $groupIds = Group::pluck('id')->toArray();
        $numberOfRaws = 0;
        $studentsToCreate = [];

        while ($numberOfRaws < 200) {
            foreach ($groupIds as $groupId) {
                $studentsGroupsCount = rand(10, 30);

                for ($i = 1; $i <= $studentsGroupsCount; $i++) {
                    if ($numberOfRaws >= 200) {
                        break;
                    }

                    $firstName = $faker->firstName;
                    $lastName = $faker->lastName;

                    $studentsToCreate[] = [
                        'group_id' => $groupId,
                        'first_name' => $firstName,
                        'last_name' => $lastName,
                    ];
                    $numberOfRaws++;
                }
            }
        }
        $chunks = array_chunk($studentsToCreate, 100);
        foreach ($chunks as $chunk) {
            Student::insert($chunk);
        }
    }
}