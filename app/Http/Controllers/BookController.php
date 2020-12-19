<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::get();
        return view('home', compact('books'));
        // return view('home', ['books' => $books]); //? Another Way To Send Data
    }

    public function show($id)
    {
        $book = Book::where('id',$id)->first();
        return view('show', compact('book'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $book = new Book();
        $book->name = $request->bookName;
        $book->desc = $request->bookDesc;
        $book->save();

        return redirect('books/show/'.$book->id);
    }

    public function edit($id)
    {
        $book = Book::where('id',$id)->first();
        return view('edit',compact('book'));
    }

    public function update($id , Request $request)
    {

        // dd($id);
        $book = Book::findorfail($id);
        $book->name = $request->bookName;
        $book->desc = $request->bookDesc;
        $book->save();

        return redirect('books/show/' . $book->id);
    }

    public function delete($id)
    {
        $book = Book::find($id);
        $book->delete();

        return redirect('books');
        
    }
}
