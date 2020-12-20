
@extends('layouts/app')
@section('content')

@if($errors->any())
@foreach($errors->all() as $error)
<div if (Condition) {
     class="alert alert-danger" }>
    {{$error}}
</div>
@endforeach
@endif

<form action="{{url('books/update',$book->id)}}" method="post">
  @csrf

 <input type="text" name="bookName" 
   @if( empty($errors->all()))
    <?= 'value ="' .$book->name .'"'; ?>
    @else
     <?= 'value ="'. old('bookName') .'"';?>
    @endif
  >
  <input type="text" name="bookDesc"
    @if( empty($errors->all()))
    <?= 'value ="' .$book->desc .'"'; ?>
    @else
     <?= 'value ="'. old('bookDesc') .'"';?>
    @endif
  > 
  <input type="submit" name="" value="update">
</form>
@endsection


