<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Repositories\StudentDatabaseRepository;

class StudentControllerApi extends Controller
{
    public function __construct(private StudentDatabaseRepository $studentDatabaseRepository)
    {

    }

    /**
     * @OA\Post(
     *     path="/api/v1/student/store",
     *     summary="Create a new student",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(property="first_name", type="string"),
     *                 @OA\Property(property="last_name", type="string"),
     *                 @OA\Property(property="group_name", type="string")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Student created successfully"
     *     )
     * )
     */
    public function storeStudent(Request $request): Response
    {
        $group = $this->studentDatabaseRepository->updateOrCreateGroup($request);
        $this->studentDatabaseRepository->createStudent($request, $group);
        return response()->noContent();
    }

    /**
     * @OA\Delete(
     *     path="/api/v1/student/delete",
     *     summary="Delete a student by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="query",
     *         required=true,
     *         description="ID of the student to delete",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Student deleted successfully"
     *     )
     * )
     */
    public function destroyStudent(Request $request): Response
    {
        $id = $request->input('id');
        $this->studentDatabaseRepository->deleteFromStudentCourse($id);
        $this->studentDatabaseRepository->deleteStudent($id);
        return response()->noContent();
    }
}