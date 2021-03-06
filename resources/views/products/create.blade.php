@extends('layouts.app')
@section('title', 'Create Product')
@section('content')

@if($errors->any())
    @foreach($errors->all() as $error)
        <p>{{$error}}</p>
    @endforeach
@endif

<div class="container">
    <div class="card">
        <div class="card-header">Create Product</div>
            <div class="card-body">
                <form 
                    action="/products" 
                    class="form-group"
                    method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                    <label for="">Product name</label>
                    <input 
                        type="text" 
                        name="title" 
                        class="form-control"
                        required>
                    </div>
                    <div class="form-group">
                    <label for="">Description</label>
                    <input 
                        type="text" 
                        name="description" 
                        class="form-control"
                        required>
                    </div>
                    <div class="form-group">
                    <label for="">Price</label>
                    <input 
                        type="number" 
                        name="price" 
                        class="form-control"
                        required>
                    </div>
                    <div class="form-group">
                    <label for="">Stock</label>
                    <input 
                        type="number" 
                        name="stock" 
                        class="form-control"
                        required>
                    </div>
                    <div class="form-group">
                    <label for="">Tags</label>
                    <input 
                        type="text" 
                        name="tags" 
                        class="form-control"
                        required>
                    </div>
                    <div class="form-group">
                    <label for="">Pics</label>
                    <input 
                        type="file" 
                        name="image" 
                        class="">
                    </div>
                    <button 
                        type="submit" 
                        class="btn btn-outline-primary">Create</button>
                    <a 
                    href="./" 
                    class="btn btn-outline-danger">Cancel</a>
                </form>
            </div>
    </div>
</div>

@endsection