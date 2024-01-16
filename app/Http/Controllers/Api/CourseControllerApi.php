<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\FormerResponseForApi;
use Illuminate\Http\Response;
use App\Repositories\CourseDatabaseRepository;
use OpenApi\Annotations as OA;

class CourseControllerApi extends Controller
{
    public function __construct(private FormerResponseForApi $formerResponseForApi, private CourseDatabaseRepository $courseDatabaseRepository)
    {

    }

    /**
     * @OA\Get(
     *     path="/api/v1/course/showCourse",
     *     summary="Get a list of courses",
     *     @OA\Parameter(
     *         name="format",
     *         in="query",
     *         description="Response format (json or xml)",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response="200", description="Successful response"),
     *     @OA\Response(response="400", description="Request error")
     * )
     */
    public function showCourse(Request $request): Response
    {
        $courses = $this->courseDatabaseRepository->getShowCourse();

        return $this->formerResponseForApi->responseForming($request, $courses);
    }

    /**
     * @OA\Get(
     *     path="/api/v1/course/show_students_on_course/{course}",
     *     summary="Get a list of students on a specific course",
     *     @OA\Parameter(
     *         name="format",
     *         in="query",
     *         description="Response format (json or xml)",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="courseFromButton",
     *         in="path",
     *         description="ID of the course",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response="200", description="Successful response"),
     *     @OA\Response(response="400", description="Request error")
     * )
     */
    public function showStudentsOnCourse(Request $request, int $courseFromButton): Response
    {
        $course = $this->courseDatabaseRepository->getCourseForShowStudentsOnCourse($courseFromButton);

        $students = $this->courseDatabaseRepository->getStudentsForShowStudentsOnCourse($course);

        return $this->formerResponseForApi->responseForming($request, $students);
    }

    /**
     * @OA\Delete(
     *     path="/api/v1/course/{course_id}/remove_student/{student_id}",
     *     summary="Remove a student from a course",
     *     @OA\Parameter(
     *         name="course",
     *         in="path",
     *         description="ID of the course",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="student",
     *         in="path",
     *         description="ID of the student",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response="204", description="No content"),
     *     @OA\Response(response="400", description="Request error")
     * )
     */
    public function removeStudentFromCourse(int $course, int $student): Response
    {
        $course = $this->courseDatabaseRepository->getCourseWithId($course);

        $this->courseDatabaseRepository->deleteForRemoveStudentFromCourse($course, $student);

        return response()->noContent();
    }

    /**
     * @OA\Get(
     *     path="/api/v1/course/show_all_students_without_course/{courseId}",
     *     summary="Get a list of students not enrolled in a specific course",
     *     @OA\Parameter(
     *         name="format",
     *         in="query",
     *         description="Response format (json or xml)",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="courseId",
     *         in="path",
     *         description="ID of the course",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response="200", description="Successful response"),
     *     @OA\Response(response="400", description="Request error")
     * )
     */
    public function showAllStudentsWithoutCourse(Request $request, int|string $courseId): Response
    {
        $course = $this->courseDatabaseRepository->getCourseWithId($courseId);

        $enrolledStudents = $this->courseDatabaseRepository->getEnrolledStudents($course);

        $allStudents = $this->courseDatabaseRepository->getAllStudents();

        $students = $this->courseDatabaseRepository->getDiffStudents($allStudents, $enrolledStudents);

        return $this->formerResponseForApi->responseForming($request, $students);
    }

    /**
     * @OA\Post(
     *     path="/api/v1/course/{courseId}/add_student_to_course/{studentId}",
     *     summary="Add a student to a course",
     *     @OA\Parameter(
     *         name="courseId",
     *         in="path",
     *         description="ID of the course",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Parameter(
     *         name="studentId",
     *         in="path",
     *         description="ID of the student",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response="204", description="No content"),
     *     @OA\Response(response="400", description="Request error")
     * )
     */
    public function storeStudentToCourse(int|string $courseId, int|string $studentId): Response
    {
        $course = $this->courseDatabaseRepository->getCourseWithId($courseId);

        $student = $this->courseDatabaseRepository->getStudentWithId($studentId);

        $this->courseDatabaseRepository->writeStudentToCourse($course, $student);

        return response()->noContent();
    }
}