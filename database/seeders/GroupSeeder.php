<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Group;
use Faker\Factory as Faker;

class GroupSeeder extends Seeder
{
    public function run(): void
    {
        Group::truncate();

        $faker = Faker::create();

        for ($i = 1; $i <= 10; $i++) {
            Group::select('name')->updateOrInsert([
                'name' => $faker->regexify('[A-Z]{2}-\d{2}'),
            ]);
        }
    }
}