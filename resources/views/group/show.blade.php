@extends('admin.admin_layout')

@section('content')
    @foreach ($groups as $group)
        <p>Group: {{$group->name}} | Quantity of students: {{$group->students_count}}</p>
    @endforeach
@endsection