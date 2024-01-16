<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Group;
use Illuminate\Database\Eloquent\Collection;

class GroupDatabaseRepository implements GroupDatabaseRepositoryInterface
{
    public function countStudentsDependentGroup(): Collection
    {
        return Group::withCount('students')
        ->orderByDesc('students_count')
        ->get();
    }
}

