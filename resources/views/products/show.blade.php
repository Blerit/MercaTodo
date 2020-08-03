@extends('layouts.app')
@section('title', 'MerkaTodo')
@section('content')
    <div class="container text-center">
        <div class="card">          
            <div class="card-body">
                <img 
                    src="/storage/{{$product->image}}" class="card-img-top" alt="...">
                <h4 class="card-title">{{$product->title}}</h4>
                <h5 class="card-subtitle mb-2 text-muted">
                    $ {{$product->price}} COP</h5>
                <p class="card-text">{{$product->description}}</p>
                <a href="#" class="btn btn-sm btn-info" style="width: 12rem;">Comprar!</a>
                <a href="javascript: history.go(-1)" class="btn btn-sm btn-danger" style="width: 12rem;">Back</a>
            </div>
        </div>
    </div>
@endsection