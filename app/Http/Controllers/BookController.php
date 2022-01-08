<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookType;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $books = Book::where('book_title', 'like', "%$search%")->orderBy('book_id', 'asc')->paginate(3);
        return view('book.index', [
            "books" => $books,
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
        $booktype = BookType::all();
        $subject = Subject::all();
        $book = DB::table('books')->join('booktype', 'books.bt_id', '=', 'booktype.bt_id')
            ->join('subject', 'subject.sub_id', '=', 'books.sub_id')
            ->select('books.*', 'booktype.*', 'subject.*')
            ->get();
        return view('book.create', [
            "book" => $book,
            "booktype" => $booktype,
            "subject" => $subject
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

        $title = $request->get('name');
        $author = $request->get('author');
        $bt = $request->get('bt_id');
        $sub = $request->get('sub_id');
        $remain = $request->get('remain');

        $img = $request->file('img');
        $folder = 'assets/img';
        $nameImage = $img->getClientOriginalName();
        $img->move($folder, $nameImage);

        $book = new Book();
        $book->book_title = $title;
        $book->book_img = $folder . '/' . $nameImage;
        $book->author = $author;
        $book->bt_id = $bt;
        $book->sub_id = $sub;
        $book->remain = $remain;
        $book->save();
        return Redirect::route('book.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Book::find($id);
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
        $subject = Subject::all();
        $booktype = BookType::all();
        $book = Book::find($id);
        return view('book.edit', [
            "book" => $book,
            "booktype" => $booktype,
            "subject" => $subject
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

        $book = Book::find($id);
        $book->book_title = $request->get('name');
        $book->book_img = $request->get('img');
        $book->author = $request->get('author');
        $book->bt_id = $request->get('bt');
        $book->sub_id = $request->get('sub');
        $book->remain = $request->get('remain');
        $book->save();
        return Redirect::route('book.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::find($id)->delete();
        return Redirect::route('book.index');
    }
}
