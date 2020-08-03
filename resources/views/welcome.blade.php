@extends('layouts.app')
@section('title', 'MerkaTodo')
@section('content')
<div class="container mb-4">
          <img src="images/ecommerce.original.jpg" class="d-block w-100" alt="...">
      </div>
      <!-- <div class="carousel-item">
        <img src="images/imagen.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="images/imagen.png" class="d-block w-100" alt="...">
      </div> -->
    </div>
  </div>
</div>
  <div class="container">
    <div class="row"> 
      @foreach($products as $product)
      @if($product->isEnabled)
          <div class="col-md-4 mb-4">
            <div class="card">
              <a href="products/{{$product->id}}">                
                <img src="storage/{{$product->image}}" class="card-img-top" alt="...">
              </a>
              <div class="card-body">
                <h5 class="card-title"><b>{{$product->title}}</b></h5>
                <p class="card-text">{{$product->description}}</p>
                <span>
                  $ {{$product->price}} COP
                </span><br>
                <small>
                  Unidades Disponibles: {{$product->stock}}
                </small><br>
                <a href="#" class="btn btn-sm btn-info d-block">! Comprar !</a>
              </div>
            </div>
          </div>         
        @endif
        @endforeach
    </div>
      <div class="pagination justify-content-center">
        {{$products->links()}} 
      </div>
  </div>
@endsection