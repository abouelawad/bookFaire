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

    {{-- <div class="form-group"> --}}
    <input class="form-control" type="text" value="{{ old('bookName') }}" name="bookName" id="name"><br>

    <input class="form-control" type="text" value="{{ old('bookDesc') }}" name="bookDesc" id="desc"><br>

    <input class="form-control" type="file" name="image" id="image"><br>
{{-- </div> --}}
    <input type="submit" name="" value="add book">
  </form>
</div>

@endsection

