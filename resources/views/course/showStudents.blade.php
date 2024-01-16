@extends('admin.admin_layout')

@section('content')
    <h3>Course name: {{$course->name}}</h3>
    @foreach ($course->students as $student)
    <p>Student: {{$student->first_name}} {{$student->last_name}}</p>
    <form method="POST" action="{{ route ('remove_student_from_course', ['course_id' => $course['id'], 'student_id' => $student['id']])}}">
        @csrf
        @method('DELETE')
        <button type="submit">
            Delete {{$student->first_name}} {{$student->last_name}} from course
        </button>
    </form>
    @endforeach
@endsection