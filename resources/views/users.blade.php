@extends('layouts.app')

@section('content')
  <div class="container mt-2">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Verified</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
        <tr>
          <th scope="row">{{$user->id}}</th>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          @empty('{{$user->email_verified_at}}')
            <td>NOK</td>
          @else
            <td>OK</td>
          @endempty  
        </tr>
        @endforeach        
      </tbody>
    </table>
  </div>
@endsection