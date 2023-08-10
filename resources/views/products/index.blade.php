@extends('layout.app')
@section('main')
<div>
<div class="text-right">
    <a href="products/create" class="btn btn-primary mt-2 mr-2">New Products</a>
</div>
<table class="table table-hover">
    <thead>
      <tr>

        <th>Sr#</th>
        <th>Name</th>
        <th>Image</th>
        <th>Action</th>

      </tr>
    </thead>
    <tbody>
      @foreach($products as $row)
      <tr>
        <td>{{$loop->index+1}}</td>
        <td><a href="products/{{$row->id}}/show" class="text-dark"> {{$row->name}}</td></a>
        <td><img src="products/{{$row->image}}" class="rounded-circle" height="50px" width="50px" alt=""></td>
        <td><a href="products/{{$row->id}}/edit" class="btn btn-dark btn-sm ">Edit</a>
        <form method="POST" class="d-inline" action="products/{{$row->id}}/delete">
        @csrf
        @method('DELETE')
    <button type="submit" class=" btn btn-danger btn-sm">Delete</button></form></td>

      </tr>
      @endforeach
</tbody>
</table>
</div>
@endsection
