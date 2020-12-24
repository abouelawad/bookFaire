@extends('layouts/admin')
@section('content')
<div class="container">

 {{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

  
  <form action="{{url('authors/store')}}" method="post" >
    @csrf

   
    <input class="form-control" type="text" value="{{ old('authorName') }}" name="name" id="name"><br>

    <input class="form-control" type="text" value="{{ old('authorBio') }}" name="bio" id="desc"><br>

    <input type="submit" name="" value="add author">
  </form>
</div>

@endsection

