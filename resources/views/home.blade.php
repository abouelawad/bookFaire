
@extends('layouts/app')

@section('content')
    
  @foreach ($books as $book)
  <h3 >
    <a href="{{ url('books/show',$book->id) }}">{{$book->name}}</a>
  </h3>
  <p >{{$book->desc}}</p>
  @endforeach 
 
  <a class="btn btn-success " href="{{url('books/create')}}"
     role="button">
    Add New Book
  </a>
  

@endsection


