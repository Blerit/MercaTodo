@extends('layouts.app')
@section('title', 'Users Info')
@section('content')
<div class="container text-center">
    <div class="card-body">
        <h4 class="card-title">{{$user->name}}</h4>
        <h5 class="card-subtitle mb-2 text-muted">{{$user->email}}</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="javascript: history.go(-1)" class="card-link">Back</a>
    </div>
</div>
@endsection