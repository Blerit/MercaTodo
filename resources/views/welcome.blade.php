@extends('layouts.app')
@section('title', 'MerkaTodo')
@section('content')
  <div class="container">
    @foreach($products as $product)
      @if($product->isEnabled)
        <div class="card" style="width: 18rem;">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">{{$product->title}}</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      @endif
    @endforeach
  </div>
@endsection