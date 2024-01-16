<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use App\Repositories\GroupDatabaseRepository;

class GroupController extends Controller
{
    public function __construct(private GroupDatabaseRepository $groupDatabaseRepository)
    {

    }

    public function show(): View
    {
        $groups = $this->groupDatabaseRepository->countStudentsDependentGroup();

        return view('group.show', compact('groups'));
    }
}
