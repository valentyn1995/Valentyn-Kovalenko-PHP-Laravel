<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Repositories\StudentDatabaseRepository;

class StudentController extends Controller
{
    public function __construct(private StudentDatabaseRepository $studentDatabaseRepository)
    {

    }
    public function createStudent(): View
    {
        return view('student.create');
    }

    public function storeStudent(Request $request): RedirectResponse
    {
        $group = $this->studentDatabaseRepository->updateOrCreateGroup($request);

        $this->studentDatabaseRepository->createStudent($request, $group);

        return redirect('/student/create');
    }

    public function showFormForDelete(): View
    {
        return view('student.delete');
    }

    public function destroyStudent(Request $request): RedirectResponse
    {
        $id = $request->input('id');

        $this->studentDatabaseRepository->deleteFromStudentCourse($id);

        $this->studentDatabaseRepository->deleteStudent($id);

        return redirect('/student/show_for_delete');
    }
}
