@extends('layouts.app')
@section('title', 'MerkaTodo')
@section('content')
<div class="container">
  <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
          <img src="images/1595890034Captura de pantalla de 2020-06-07 22-34-40.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="images/imagen.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="images/imagen.png" class="d-block w-100" alt="...">
      </div>
    </div>
  </div>
</div>
  <div class="container">
    @foreach($products as $product)
      @if($product->isEnabled)
        <div class="row"> 
          <div class="col-md-4">
            <div class="card" style="width: 24rem;">
              <img src="storage/{{$product->image}}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">{{$product->title}}</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div><br>
          </div>         
        </div>
      @endif
    @endforeach
  </div>
@endsection