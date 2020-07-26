@extends('layouts.app')
@section('title', 'Create Product')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">Create Product</div>
            <div class="card-body">
                <form 
                    action="/products" 
                    class="form-group"
                    method="post">
                    @csrf
                    <div class="form-group">
                    <label for="">Product name</label>
                    <input 
                        type="text" 
                        name="title" 
                        class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="">Description</label>
                    <input 
                        type="text" 
                        name="description" 
                        class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="">Price</label>
                    <input 
                        type="number" 
                        name="price" 
                        class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="">Stock</label>
                    <input 
                        type="number" 
                        name="stock" 
                        class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="">Tags</label>
                    <input 
                        type="text" 
                        name="tags" 
                        class="form-control">
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