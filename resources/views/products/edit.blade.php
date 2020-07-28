@extends('layouts.app')
@section('title', 'Edit Product')
@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">Edit Product</div>
    <div class="card-body">
      <form 
        action="/products/{{$product->id}}" 
        method="POST"
        enctype="multipart/form-data">
        @method('PUT')
        @csrf
          <div class="form-group">
            <label>Product Name</label>
            <input 
              type="text" 
              name="title" 
              class="form-control" 
              id="exampleInputEmail1" 
              aria-describedby="emailHelp" 
              value="{{$product->title}}"
              required>
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
          <div class="form-group">
            <label for="">Stock</label>
            <input 
              type="number" 
              name="stock" 
              class="form-control" 
              id="exampleInputPassword1" 
              value="{{$product->stock}}" 
              required>
          </div>
          <div class="form-group">
            <label for="">Tags</label>
            <input 
              type="text" 
              name="tags" 
              class="form-control" 
              id="exampleInputPassword1" 
              value="{{$product->tags}}" 
              required>
          </div>
          <div class="form-group">
            <label for="">Pic</label>
            <input 
              type="file" 
              name="image"
              id="exampleInputPassword1" 
              value="">
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