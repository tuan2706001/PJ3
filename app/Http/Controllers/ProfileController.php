<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\profile;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $idprofile = $request->session()->get('mi_id');

        $profile = profile::where('mi_id', '=', $idprofile)->first();

        return view('profile.index', [
            "profile" => $profile
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $password = $request->get('password');
        $phone = $request->get('phone');
        $profile = new profile();
        $profile->mi_name = $name;
        $profile->mi_userName = $email;
        $profile->mi_passWord = $password;
        $profile->mi_phone = $phone;
        $profile->save();
        return Redirect::route('profile.index');
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
        $profile = Profile::find($id);
        return view('profile.edit', [
            "profile" => $profile
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
        $profile = profile::find($id);
        $profile->mi_name = $request->get('name');
        $profile->mi_userName = $request->get('email');
        $profile->mi_passWord = $request->get('password');
        $profile->mi_phone = $request->get('phone');
        $profile->save();
        return Redirect::route('profile.index');
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
