@extends('layouts.app')

@section('content')

<form action="/users/{{$user->id}}" method="POST">
  @method('PUT')
  @csrf
  <div class="container">
    <div class="form-group">
      <label for="exampleInputEmail1">Name</label>
      <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$user->name}}">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Email</label>
      <input type="email" name="email" class="form-control" id="exampleInputPassword1" value="{{$user->email}}">
    </div>
    <button type="submit" class="btn btn-outline-primary">Update</button>
    <!-- <button type="submit" class="btn btn-outline-danger">Cancel</button> -->
  </div>
</form>
@endsection
