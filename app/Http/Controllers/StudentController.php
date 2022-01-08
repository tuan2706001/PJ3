<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Classes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $students = Student::where('stu_name', 'like', "%$search%")->orderBy('stu_id', 'asc')->paginate(3);
        return view('student.index', [
            "student" => $students,
            "search" => $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $class = Classes::all();
        $student = DB::table('students')->join('classes', 'students.cl_id', '=', 'classes.cl_id')
            ->select('classes.*', 'students.*')
            ->get();
        return view('student.create', [
            "class" => $class,
            "student" => $student
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->get('name');
        $email = $request->get('email');
        $passWord = $request->get('passWord');
        $phone = $request->get('phone');
        $class = $request->get('cl_id');
        $student = new Student();
        $student->stu_name = $name;
        $student->stu_userName = $email;
        $student->stu_passWord = $passWord;
        $student->stu_phone = $phone;
        $student->cl_id = $class;
        $student->status = 0;
        $student->save();
        return Redirect::route('student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $students = Classes::all();
        $student = Student::find($id);
        return view('student.edit', [
            "student" => $student,
            "students" => $students,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student->stu_name = $request->get('name');
        $student->stu_userName = $request->get('email');
        $student->stu_passWord = $request->get('passWord');
        $student->stu_phone = $request->get('phone');
        $student->cl_id = $request->get('cl_id');
        $student->status = $request->get('block');
        $student->save();
        return Redirect::route('student.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
