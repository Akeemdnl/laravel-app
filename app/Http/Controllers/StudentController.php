<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequestForm;
use Illuminate\Http\Request;
use App\Models\Students;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;

class StudentController extends Controller
{

    public function index() {
        //Fetch student data for table
        // $students = DB::select('select * from students');
        // $title = 'Student List';
        // return view('home',[
        //     'students'=>$students,
        //     'title'=>$title
        // ]);
        $students = Students::paginate(5);
        $title = 'Student List';    
        return view('home', compact('students','title'));
    }

    public function addStudent(Request $request) {
        if($request->user()->canAdd()){
            return('addstudent');
        }else{
            return redirect('/')->withErrors('You are not permitted to add Student data');
        }
    }

    public function edit($id) {
        $student = Students::find($id);
        $title = "Edit Student Data";
        return view('edit',[
            'student'=> $student,
            'title'=>$title
        ]);
    }

    public function update(Request $request) {
        $id = $request->input('id');
        $student = Students::find($id);
        $student->student_id = $request->input('student_id');
        $student->name = $request->input('name');
        $student->year = $request->input('year');
        $student->grade = $request->input('grade');

        $student->save();
        return redirect('/')->withMessage('Student updated successfully');

    }

    public function destroy($id) {

        DB::delete('delete from students where id = ?',[$id]);
        $data['message'] = 'Student deleted successfully';
        return redirect('/')->with($data);
        // $student = Students::find($id);
        // if($student && ($student->student_id == $request->user()->id || $request->user()->isAdmin())){
        //     $student->delete();
        //     $data['message'] = 'Student deleted successfully';
        // }else {
        //     $data['errors'] = 'Invalid Operations. You are not permitted!';
        // }

        // return redirect('/')->with($data);
        
    }

    public function store(StudentRequestForm $request) {
        $student = new Students();
        $student->student_id = $request->get('student_id');
        $student->name = $request->get('name');
        $student->year = $request->get('year');
        $student->grade = $request->get('grade');

        //Add duplication here...

        $student->save();
        return redirect('/')->withMessage('Student added successfully');

    }

   
}
