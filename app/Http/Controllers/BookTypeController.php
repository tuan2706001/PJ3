<?php

namespace App\Http\Controllers;

use App\Models\BookType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BookTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $booktype = BookType::where('bt_name', 'like', "%$search%")->orderBy('bt_id', 'asc')->paginate(3);
        return view('booktype.index', [
            "booktype" => $booktype,
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
        return view('booktype.create');
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
        $booktype = new BookType();
        $booktype->bt_name = $name;
        $booktype->save();
        return Redirect::route('booktype.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booktype = BookType::find($id);
        return $booktype;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booktype = BookType::find($id);
        return view('booktype.edit', [
            "booktype" => $booktype
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

        $booktype = BookType::find($id);
        $booktype->bt_name = $request->get('name');
        $booktype->save();
        return Redirect::route('booktype.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BookType::find($id)->delete();
        return Redirect::route('booktype.index');
    }
}
