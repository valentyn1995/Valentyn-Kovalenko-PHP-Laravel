<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//main route
Route::get('/', function () {
    return view('main');
});

//routes for student
Route::get('/student/create', [StudentController::class, 'createStudent'])->name('create_student');
Route::post('/student/store', [StudentController::class, 'storeStudent'])-> name('store_student');
Route::get('/student/show_for_delete', [StudentController::class,'showFormForDelete'])->name('show_form_for_delete');
Route::delete('/student/delete', [StudentController::class,'destroyStudent'])->name('destroy_student');

//routes for group
Route::get('/group/show', [GroupController::class,'show'])->name('show_group');

//routes for course
Route::get('/course/showCourse', [CourseController::class,'showCourse'])->name('show_course');
Route::get('/course/show_students_on_course/{course}', [CourseController::class,'showStudentsOnCourse'])->name('show_students_on_course');
Route::delete('/course/{course_id}/remove_student/{student_id}', [CourseController::class,'removeStudentFromCourse'])->name('remove_student_from_course');
Route::get('/course/show_all_students_without_course/{courseId}', [CourseController::class, 'showAllStudentsWithoutCourse'])->name('show_all_students_without_course');
Route::post('/course/{courseId}/add_student_to_course/{studentId}', [CourseController::class,'storeStudentToCourse'])->name('store_student_to_course');