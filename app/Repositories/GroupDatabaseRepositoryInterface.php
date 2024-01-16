<?php

declare(strict_types= 1);

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface GroupDatabaseRepositoryInterface
{
    public function countStudentsDependentGroup(): Collection;
}