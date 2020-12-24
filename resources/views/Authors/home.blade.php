
@extends('layouts/admin')

@section('content')
    
  @foreach ($authors as $author)
  <h3 >
    <a href="{{ url('authors/show',$author->id) }}">{{$author->name}}</a>
  </h3>
  <p >{{$author->bio}}</p>
  @endforeach 
 
  <a class="btn btn-success " href="{{url('authors/create')}}"
     role="button">
    Add New Author
  </a>
  

@endsection


