@extends('admin.admin_layout')

@section('content')
    <div class="container-student">
        <h2>Add new student</h2>
        <form method="POST" action="{{ route('store_student')}}">
            @csrf
            <div class="form-student">
                <label for="first_name">First name</label> 
                <input type="text" name="first_name" id="first_name" required>
            </div>
            <div class="form-student">    
                <label for="last_name">Last name</label>
                <input type="text" name="last_name" id="last_name" required>
            </div>
            <div class="form-student">
                <label for="group_name">Number of group</label>
                <input type="text" name="group_name" id="group_name" required>
            </div>

            <button type="submit" class="btn-create-student">Add student</button>
        </form>
    </div>
@endsection