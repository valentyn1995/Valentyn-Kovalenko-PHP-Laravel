@extends('admin.admin_layout')

@section('content')
    <div class="container-student">
        <h2>Delete student by ID</h2>
        <form method="POST" action="{{ route('destroy_student')}}">
            @csrf
            @method('DELETE')
            <div class="form-student">
                <label for="id">ID</label> 
                <input type="text" name="id" id="id" required>
            </div>
            <button type="submit" class="btn-create-student">Delete student</button>
        </form>
    </div>
@endsection