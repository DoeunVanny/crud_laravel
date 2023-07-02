@extends('products.lyout')

@section('main')

      <div class="container mt-4  w-100 bg-danger" style="height:100px ">
             <h1 class="text-primary"> Add Product </h1>
             <button class="btn btn-success">
                  <a href=" {{ route('product.index') }}">Product</a>
             </button>
        </div>
      <div class="container">
             <form action=" {{ route('product.update',$product->id)}}" method="post" enctype="multipart/form-data">
                  @csrf

                   <label for="">Name</label>
                   <input type="text" name="name" value="{{$product->name}}" class="form-control">
                   <label for="">Price</label>
                   <input type="text" name="price" value="{{ $product->price}}" class="form-control">
                   <label for="">Image</label>
                   <img src="/img/{{ $product->image}}" width="60px" alt="" >
                   <input type="file" name="image" class="form-control">

                 

                   <button type="submit" class="btn btn-success mt-2">Add product</button>
             </form>
      </div>



@endsection