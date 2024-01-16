<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\CourseDatabaseRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CourseController extends Controller
{
    public function __construct(private CourseDatabaseRepository $courseDatabaseRepository)
    {

    }

    public function showCourse(): View
    {
        $courses = $this->courseDatabaseRepository->getShowCourse();

        return view('course.show', compact('courses'));
    }

    public function showStudentsOnCourse(int $courseFromButton): View
    {
        $course = $this->courseDatabaseRepository->getCourseForShowStudentsOnCourse($courseFromButton);

        $students = $this->courseDatabaseRepository->getStudentsForShowStudentsOnCourse($course);

        return view('course.showStudents', compact('course', 'students'));
    }

    public function removeStudentFromCourse(int|string $course, int|string $student): RedirectResponse
    {
        $course = $this->courseDatabaseRepository->getCourseWithId($course);

        $this->courseDatabaseRepository->deleteForRemoveStudentFromCourse($course, $student);

        return redirect('/course/show_students_on_course/' . $course->id);
    }

    public function showAllStudentsWithoutCourse(int|string $courseId): View
    {
        $course = $this->courseDatabaseRepository->getCourseWithId($courseId);

        $enrolledStudents = $this->courseDatabaseRepository->getEnrolledStudents($course);

        $allStudents = $this->courseDatabaseRepository->getAllStudents();

        $students = $this->courseDatabaseRepository->getDiffStudents($allStudents, $enrolledStudents);

        return view('course.showAllStudentsWithoutCourse', compact('course', 'students'));
    }

    public function storeStudentToCourse(int|string $courseId, int|string $studentId): RedirectResponse
    {
        $course = $this->courseDatabaseRepository->getCourseWithId($courseId);
        
        $student = $this->courseDatabaseRepository->getStudentWithId($studentId);

        $this->courseDatabaseRepository->writeStudentToCourse($course, $student);

        return redirect('/course/show_all_students_without_course/' . $course->id);
    }
}