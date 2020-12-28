@extends('layouts/user')
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

  
  <form action="{{url('users/store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input class="form-control" type="email"  name="email" id="name"><br>
    <input class="form-control" type="password"  name="password" id="desc"><br>
    <input type="submit" name="" value="Register" class="btn btn-primary">
  </form>
</div>

@endsection

