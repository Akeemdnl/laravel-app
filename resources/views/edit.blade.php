@extends('layouts.main')

@section('container')
    <h1>Edit Student</h1>
    <form action="/update" method="post"> 
        @csrf
        <div class="form-group">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input required value={{ $student->id }} type="hidden" name="id" class="form-control">
            <p>Student ID:</p>
            <input required value={{ $student->student_id }} placeholder="Enter Student ID" type="text" name="student_id" class="form-control">
            <p>Student Name:</p>
            <input required value="{{ $student->name }}" placeholder="Enter Student Name" type="text" name="name" class="form-control">
            <p>Student Year:</p>
            <input required value={{ $student->year }} placeholder="Enter Student Year" type="number" name="year" class="form-control">
            <p>Student Grade:</p>
            <input required value={{ $student->grade }} placeholder="Enter Student Grade" type="text" name="grade" class="form-control">

            <div>
                <input style="margin-top: 10px" type="submit" name="edit" class="btn btn-primary" value="Save"> 
            </div>
            
        </div>
    </form>
@endsection