@extends('layouts.app')
@section('title', 'Products')
@section('content')
  <div class="container text-center">
    <div class="card text-white bg-dark">      
        <h3 class="mb-0">PRODUCTS LIST</h3>      
    </div>
  </div>
  <div class="container mt-2">
    @if (session('status'))
      <div class="alert alert-success" role="alert">
          {{ session('status') }}
      </div>
    @endif
    <table class="table text-center">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Title</th>
          <th scope="col">Price</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($products as $product)          
            <tr>
              <th scope="row">{{$product->id}}</th>
              <td>
                <a href="products/{{$product->id}}">{{$product->title}}</a>
              </td>
              <td>{{$product->price}}</td>              
              <td>
                <a href="products/{{$product->id}}/edit"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"/>
                <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z"/>
                </svg></a>
              </td>
            </tr>          
        @endforeach  
      </tbody>       
    </table>
    <div class="pagination justify-content-center">
      {{$products->links()}} 
    </div>  
  </div>  
@endsection