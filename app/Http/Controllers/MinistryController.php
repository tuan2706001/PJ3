<?php

namespace App\Http\Controllers;

use App\Models\Ministry;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class MinistryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $ministries = Ministry::where('mi_name', 'like', "%$search%")->orderBy('mi_id', 'asc')->paginate(3);
        return view('ministry.index', [
            "ministry" => $ministries,
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
        return view('ministry.create');
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
        $role = $request->get('role');
        $block = $request->get('block');
        $ministry = new Ministry();
        $ministry->mi_name = $name;
        $ministry->mi_userName = $email;
        $ministry->mi_passWord = $passWord;
        $ministry->mi_phone = $phone;
        $ministry->mi_permission = $role;
        $ministry->mi_status = $block;
        $ministry->save();
        return Redirect::route('ministry.index');
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
        $ministry = Ministry::find($id);
        return view('ministry.edit', [
            "ministry" => $ministry
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
        $ministry = Ministry::find($id);
        $ministry->mi_name = $request->get('name');
        $ministry->mi_userName = $request->get('email');
        $ministry->mi_passWord = $request->get('passWord');
        $ministry->mi_phone = $request->get('phone');
        $ministry->mi_permission = $request->get('role');
        $ministry->mi_status = $request->get('block');
        $ministry->save();
        return Redirect::route('ministry.index');
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
