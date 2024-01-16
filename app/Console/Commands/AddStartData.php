<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Database\Seeders\CourseSeeder;
use Database\Seeders\GroupSeeder;
use Database\Seeders\StudentSeeder;
use Database\Seeders\StudentCourseSeeder;
use Illuminate\Console\Command;

class AddStartData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate start data for database';

    public function __construct(
        private readonly CourseSeeder $courseSeeder,
        private readonly GroupSeeder $groupSeeder,
        private readonly StudentSeeder $studentSeeder,
        private readonly StudentCourseSeeder $studentCourseSeeder
    ) {
        parent::__construct();
    }

    public function handle(): void
    {
        $this->groupSeeder->run();
        $this->studentSeeder->run();
        $this->courseSeeder->run();
        $this->studentCourseSeeder->run();
    }
}