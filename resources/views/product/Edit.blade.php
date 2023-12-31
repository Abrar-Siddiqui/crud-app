@extends('product.index')
@section('contact')
<div class="container">
    <div class="row justify-content-center ">
        <h2 class=" text-center my-2  p-2  mx-auto">Update For {{ $product->name }}</h2>
        <div class=" my-2 card p-2 col-lg-4 col-md-8 col-sm-10 col-12 mx-auto my-4">
       

            <form method="POST" action="/product/{{ $product->id }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                  <input type="text" class="form-control" id="exampleInputEmail1"  name="name" placeholder="Name" value="{{ old('name',$product->name) }}">
                    @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>                      
                    @endif
                </div>
                <div class="mb-3">
                    <textarea  class="form-control" id="exampleInputEmail1"  name="description" rows="3" placeholder="Description here..." >{{ $product->description }}</textarea>
                    @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>                      
                @endif
                  </div>
                  <div class="mb-3">
                    <input type="file" class="form-control" id="exampleInputEmail1"  name="image" placeholder="Image..">
                    @if($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>                      
                @endif
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary form-control">Updated</button>
                  </div>
              </form>
        </div>
    </div>
</div>
@endsection