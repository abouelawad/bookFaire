@extends('layouts/app')
@section('content')
<div class="container">

 @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

  
  <form action="{{url('books/store')}}" method="post" enctype="multipart/form-data">
    @csrf

  
    <input class="form-control" type="text" value="{{ old('bookName') }}" name="bookName" id="name"><br>

    <input class="form-control" type="text" value="{{ old('bookDesc') }}" name="bookDesc" id="desc"><br>

    <input class="form-control" type="file" name="image" id="image"><br>
    <select name="author_id" id="" class="form-control ">

        @foreach ($authors as $author)
        <option value="{{ $author->id }}">{{ $author->name }}</option>
        {{-- <option value="1">sadfgaf</option> --}}
        @endforeach
    </select>
    <br>

    <input type="submit" name="" value="add book" class="btn btn-primary">
  </form>
</div>

@endsection

