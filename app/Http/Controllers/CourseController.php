<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $courses = Course::where('co_name', 'like', "%$search%")->orderBy('co_id', 'asc')->paginate(3);
        return view('course.index', [
            "courses" => $courses,
            "search" => $search
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $major = Major::all();
        $course = DB::table('course')->join('major', 'major.ma_id', '=', 'course.ma_id')
            ->select('major.*', 'course.*')
            ->get();
        return view('course.create', [
            "major" => $major,
            "course" => $course
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

        $course = DB::table("course")->insert([
            'co_name' => $request->co_name,
            'ma_id' => $request->ma_id,
        ]);
        return Redirect::route('course.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::find($id);
        return $course;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $major = Major::all();
        $course = Course::find($id);
        return view('course.edit', [
            "course" => $course,
            "major" => $major
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

        $course = Course::find($id);
        $course->co_name = $request->get('name');
        $course->ma_id = $request->get('ma_id');
        $course->save();
        return Redirect::route('course.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::find($id)->delete();
        return Redirect::route('course.index');
    }
}
