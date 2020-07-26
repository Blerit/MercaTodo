@extends('layouts.app')
@section('title', 'Edit Product')
@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">Edit Product</div>
    <div class="container">
      <form action="products/{{$product->id}}" method="POST" class="mb-3">
        @method('PUT')
        @csrf
          <div class="form-group mt-2">
            <label for="exampleInputEmail1">Product Name</label>
            <input 
              type="text" 
              name="title" 
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
              type="text" 
              name="description" 
              class="form-control" 
              id="exampleInputPassword1" 
              value="{{$product->description}}" 
              required>
          </div>
          <div class="form-group">
            <label for="exampleInputTextarea1">Price</label>
            <input 
              type="number" 
              name="price" 
              class="form-control" 
              id="exampleInputPassword1" 
              value="{{$product->price}}" 
              required>
          </div>
          <button 
            type="submit" 
            class="btn btn-outline-primary">Update</button>
          <a href="../" class="btn btn-outline-danger">Cancel</a>
        
      </form>
    </div>
  </div>
</div>
@endsection