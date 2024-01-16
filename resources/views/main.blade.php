@extends('admin.admin_layout')

@section('content')
    <div class="main-container">
        <div class="nav">
            <ul>
                <li><a href="/student/create">Add student</a></li>
                <li><a href="/student/show_for_delete">Delete student by ID</a></li>
                <li><a href="/group/show">Show all groups</a></li>
                <li><a href="/course/showCourse">Show all courses</a></li>
            </ul>
        </div>
    </div>
@endsection
   