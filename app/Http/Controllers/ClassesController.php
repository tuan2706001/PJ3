<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $classes = Classes::where('cl_name', 'like', "%$search%")->orderBy('cl_id', 'asc')->paginate(3);
        return view('classes.index', [
            "classes" => $classes,
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
        $course = Course::all();
        $classes = DB::table('classes')->join('course', 'classes.co_id', '=', 'course.co_id')
            ->select('classes.*', 'course.*')
            ->get();
        return view('classes.create', [
            "classes" => $classes,
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

        $classes = DB::table("classes")->insert([
            'cl_name' => $request->cl_name,
            'co_id' => $request->co_id,
        ]);
        return Redirect::route('classes.index');
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
        $course = Course::all();
        $classes = Classes::find($id);
        return view('classes.edit', [
            "classes" => $classes,
            "course" => $course
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
        $classes = Course::find($id);
        $classes->cl_name = $request->get('name');
        $classes->co_id = $request->get('co_id');
        $classes->save();
        return Redirect::route('classes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Classes::find($id)->delete();
        return Redirect::route('classes.index');
    }
}
