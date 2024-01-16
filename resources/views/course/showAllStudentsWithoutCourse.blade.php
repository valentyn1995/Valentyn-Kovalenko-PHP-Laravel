@extends('admin.admin_layout')

@section('content')
    <h3>Course: {{$course->name}}</h3>
    <h3>Students to add</h3>
    @foreach($students as $student)
    <p>{{$student->first_name}} {{$student->last_name}}</p>
    <form method="POST" action="{{ route('store_student_to_course', ['courseId' => $course['id'], 'studentId' => $student['id']])}}">
        @csrf
        <button>
            Add student to {{$course->name}}
        </button>
    </form>
    @endforeach
@endsection