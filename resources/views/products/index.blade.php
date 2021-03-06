@extends('layouts.app')
@section('title', 'Products')
@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col">
        <div class="card">
          <div class="card-header">
            Lista de Productos
            <a 
              href="{{route('products.create')}}" 
              class="btn btn-sm btn-outline-info float-right">Crear
            </a>
          </div>
          <form class="form-inline mt-2 ml-2">
            <input 
                class="form-control mr-sm-2 float-right" 
                type="search"
                name="search" 
                placeholder="Buscar" 
                aria-label="Search">
            <button 
                class="btn btn-outline-dark my-2 my-sm-0" 
                type="submit">Buscar</button>
            </form>
          <div class="card-body">
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
                  <th scope="col">Stock</th>
                  <th scope="col">Status</th>
                  <th scope="col">Edit</th>
                  <th scope="col">Delete</th>
                </tr>
              </thead>
              <tbody>
                @foreach($products as $product)          
                    <tr>
                      <th scope="row">{{$product->id}}</th>
                      <td>
                        <a 
                        href="products/{{$product->id}}">{{$product->title}}</a>
                      </td>
                      <td>$ {{$product->price}}</td>
                      <td>{{$product->stock}}</td>
                      <td>
                        <form 
                          action="{{route('productStatusUpdate', $product->id)}}" method="POST">
                        @method('PATCH')
                        @csrf
                        @if($product->isEnabled)
                          <input 
                            type="submit" 
                            name="options" 
                            class="btn btn-outline-success btn-sm" 
                            id="option1" 
                            value="Enabled">
                        @else
                          <input 
                            type="submit" 
                            name="options" 
                            class="btn btn-outline-danger btn-sm" 
                            id="option1" 
                            value="Disabled">
                        @endif
                        </form>
                      </td>                
                      <td>
                        <a href="products/{{$product->id}}/edit"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"/>
                        <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z"/>
                        </svg></a>
                      </td>
                      <td>
                        <form 
                          action="products/{{$product->id}}" 
                          method="post">
                          @method('delete')
                          @csrf
                          <button 
                          type="submit"
                          class="btn btn-outline-danger btn-sm"
                          onclick="return confirm('¿Está seguro que desea eliminar el post?')">
                          <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                          </svg>
                          </button>
                        </form>
                      </td>
                    </tr>          
                @endforeach  
              </tbody>       
            </table>
            <div class="pagination justify-content-center">
              {{$products->links()}} 
            </div>
          </div> 
        </div>        
      </div>
    </div> 
  </div>  
@endsection