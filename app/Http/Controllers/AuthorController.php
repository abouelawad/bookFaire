<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::get();
        return view('Authors.home' , compact('authors'));
    }


    public function create()
    {
        return view('Authors/create');
    }
    
    public function store(Request $request)
    {
        $name = $request->name;
        $bio = $request->bio;

        $author = new Author();
        $author->name = $name;
        $author->bio = $bio;
        $author->save();

        return redirect('authors');
    }

    public function show($id)
    {
        $author = Author::findorfail($id);

        return view('Authors/show' , compact('author'));
    }


}
