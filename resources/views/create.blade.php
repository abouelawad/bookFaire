@extends('layouts/app')
@section('content')
<div class="container">
  
  <form action="{{url('books/store')}}" method="post">
    @csrf
    <input type="text" name="bookName" id="name">
    <input type="text" name="bookDesc" id="desc">
    <input type="submit" name="" value="add book">
  </form>
</div>

@endsection

