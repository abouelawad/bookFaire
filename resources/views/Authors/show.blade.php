
@extends('layouts/admin')
@section('content')
  <a href="{{ url('authors') }}">All authors</a>
  {{-- <a href="{{ url('authors/edit',$author->id) }}">Edit author</a>
  <a href="{{ url('authors/delete',$author->id) }}">Delete Author</a> --}}
  <h3 >{{$author->name}}</h3>
  <p  >{{$author->bio}}</p>

  <p>

    @foreach ($author->books as $book)
        {{ $book->name }} 
        {{ $book->desc }}
      <br>
        @endforeach
  </p>


  
@endsection
