@extends('layouts.app')
@section('title', 'Edit Product')
@section('content')

<form action="products/{{$product->id}}" method="POST">
  @method('PUT')
  @csrf
  <div class="container">
    <div class="form-group">
      <label for="exampleInputEmail1">Product Name</label>
      <input 
        type="text" 
        name="name" 
        class="form-control" 
        id="exampleInputEmail1" 
        aria-describedby="emailHelp" 
        value="{{$product->title}}"
        required>
      <small 
        id="emailHelp" 
        class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputTextarea1">Description</label>
      <input 
        type="email" 
        name="email" 
        class="form-control" 
        id="exampleInputPassword1" 
        value="{{$product->description}}" 
        required>
    </div>
    <button 
      type="submit" 
      class="btn btn-outline-primary">Update</button>
    <a href="../" class="btn btn-outline-danger">Cancel</a>
  </div>
</form>
@endsection