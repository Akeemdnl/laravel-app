@extends('layouts.main')

@section('container')
    <h1>Add Student</h1>
    <form action="/addstudent" method="post"> 
        @csrf
        <div class="form-group">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <p>Student ID:</p>
            <input required  placeholder="Enter Student ID" type="text" name="student_id" class="form-control">
            <p>Student Name:</p>
            <input required  placeholder="Enter Student Name" type="text" name="name" class="form-control">
            <p>Student Year:</p>
            <input required  placeholder="Enter Student Year" type="number" name="year" class="form-control">
            <p>Student Grade:</p>
            <input required  placeholder="Enter Student Grade" type="text" name="grade" class="form-control">
            <div style="margin-top: 10px">
                <input type="submit" name="save" class="btn btn-primary" value="Add Student"> 
            </div>
            
        </div>
    </form>
@endsection