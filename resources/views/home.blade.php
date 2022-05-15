@extends('layouts.main')

@section('container')
    @if(Auth::check())
        <h3>Hi, {{ Auth::user()->name }}</h3>
        @if (empty($students))
            <h4>Students list is empty</h4>
        @else   <table class="table">
            <thead>
                <tr>
                <th>Student ID</th>
                <th>Name</th>
                <th>Year</th>
                <th>Grade</th>
                <th>Actions</th>
                </tr>
            </thead>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->student_id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->year }}</td>
                    <td>{{ $student->grade }}</td>
                    <td><button class="btn btn-danger"><a onclick="return confirm('Are you sure?')" style="color: #FFFFFF; text-decoration: none;" href="{{ url('delete/' .$student->id )}}">Delete</a></button>
                    <button class="btn btn-secondary"><a style="color: #FFFFFF; text-decoration: none;" href="{{ url('edit/' .$student->id )}}">Edit</a></button>
                    </td>
                </tr>
            @endforeach
            </table>
            <div>
               {{  $students->links() }}
            </div>
        @endif
    @else
        <h3>Welcome, Login to continue</h3>
    @endif
    @endsection