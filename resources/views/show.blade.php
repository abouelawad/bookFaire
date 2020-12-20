
@extends('layouts/app')
@section('content')
  <a href="{{ url('books') }}">All Books</a>
  <a href="{{ url('books/edit',$book->id) }}">Edit Book</a>
  <a href="{{ url('books/delete',$book->id) }}">Delete Book</a>
  <h3 >{{$book->name}}</h3>
  <p  >{{$book->desc}}</p>

  <img class="img-fluid" src="{{ asset('asset/images/books/'.$book->image) }}" width="350" height="350">

  
@endsection
