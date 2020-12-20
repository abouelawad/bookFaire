<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use League\CommonMark\Inline\Element\Image;

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

        $validator = $request->validate([

                'bookName' => 'required|max:191|min:3',
                'bookDesc' => 'required|max:1000|min:5',
                'image' => 'required|image|max:10240'
            ]
        );
        #imageUpLoad
        $image = $request->file('image');
        $imageName = time() . $image->getClientOriginalName();
        $img = \Image::make($image->getRealPath());
        $img->resize(350, 350);
        $img->save(public_path('asset/images/books/' . $imageName));
    
       

        $book = new Book();
        $book->name = $request->bookName;
        $book->desc = $request->bookDesc;
        $book->image = $imageName; // NOTE TO my Self
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
        #VALIDATION
        $validator = \Validator::make(
            $request->all(),
            [
                'bookName' => 'required|max:191|min:3',
                'bookDesc' => 'required|max:1000|min:5'
            ]
        );
        if ($validator->fails()) {
            return redirect('books/edit/'.$id)
            ->withErrors($validator)
            ->withInput();
        }
        #Call The Book From DB
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
