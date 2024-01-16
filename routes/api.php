<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GroupControllerApi;
use App\Http\Controllers\Api\CourseControllerApi;
use App\Http\Controllers\Api\StudentControllerApi;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->group(function () {
    //group api
    Route::get('/group/show', [GroupControllerApi::class,'show'])->name('show_group_api');
    //course api
    Route::get('/course/showCourse', [CourseControllerApi::class,'showCourse'])->name('show_course_api');
    Route::get('/course/show_students_on_course/{course}', [CourseControllerApi::class,'showStudentsOnCourse'])->name('show_students_on_course_api');
    Route::get('/course/{course_id}/remove_student/{student_id}', [CourseControllerApi::class,'removeStudentFromCourse'])->name('remove_student_from_course_api');
    Route::get('/course/show_all_students_without_course/{courseId}', [CourseControllerApi::class, 'showAllStudentsWithoutCourse'])->name('show_all_students_without_course_api');
    Route::get('/course/{courseId}/add_student_to_course/{studentId}', [CourseControllerApi::class,'storeStudentToCourse'])->name('store_student_to_course_api');
    //student api
    Route::delete('/student/delete', [StudentControllerApi::class,'destroyStudent'])->name('destroy_student_api');
    Route::post('/student/store', [StudentControllerApi::class, 'storeStudent'])-> name('store_student_api');
});