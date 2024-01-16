@extends('admin.admin_layout')

@section('content')
    @foreach ($courses as $course)
        <p> Course: {{$course->name}}</p>
        <form method="GET" action="{{ route('show_students_on_course', ['course' => $course['id']])}}">
            <button>List of students {{$course->name}}</button>
        </form>
        <form method="GET" action="{{ route ('show_all_students_without_course', ['courseId' => $course['id']])}}">
            <button>Add student to course</button>
        </form>
    @endforeach
@endsection