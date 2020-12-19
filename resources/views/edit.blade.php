
@extends('layouts/app')
@section('content')
<form action="{{url('books/update',$book->id)}}" method="post">
  @csrf
  <input type="text" name="bookName" value ="{{ $book->name }}">
  <input type="text" name="bookDesc" value ="{{ $book->desc }}">
  <input type="submit" name="" value="update">
</form>
@endsection
