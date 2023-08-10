
@extends('layout.app')
@section('main')
<div class="container">
    <h2 class="text-muted text-center">Product Edit </h2>
   <div class="row justify-content-center">
    <div class="col-sm-8">
     <div class="card mt-3 p-3">
         <h2 class="text-muted text-center">Product#{{$product->name}}  </h2>
      <form method="POST" action="/products/{{$product->id}}/update" enctype="multipart/form-data">
       @csrf
       @method('PUT')
       <div class="form-group">
        <label for="">Name</label>
        <input type="text"  name="name" class="form-control"  value="{{old('name',$product->name)}}"/>

        @if($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name')}}</span>
      @endif
      </div>
       <div class="form-group">
        <label for="">Discription</label>
        <textarea type="text"  name="discription" class="form-control">{{old('discription',$product->discription)}}</textarea>
        @if($errors->has('discription'))
        <span class="text-danger">{{ $errors->first('discription')}}</span>
      @endif
      </div>
       <div class="form-group">
        <label for="">Image</label>
        <input type="file" name="image" class="form-control">
        @if($errors->has('image'))
        <span class="text-danger">{{ $errors->first('image')}}</span>
      @endif
      </div>
       <button type="submit" class="btn btn-dark">Submit</button>
     </form>
    </div>
    </div>
   </div>
</div>
@endsection

