@extends('products.lyout')

@section('main')

        <div class="container mt-4  w-100 bg-danger" style="height:100px ">
             <h1 class="text-light">Product</h1>
             <button class="btn btn-success">
                  <a href=" {{ route('product.create') }}" class="text-light">Post</a>
             </button>
        </div>
        <div class="container mt-3">
              <table  class="table table-hover table-bordered">
                       <thead>
                              <th>ID</th>
                              <th>NAME</th>
                              <th>PRICE</th>
                              <th>IMAGE</th>
                              <th>ACTION</th>
                       </thead>
                       <tbody>
                        @foreach($product as $item )
                        <tr>
                              <td> {{ $item->id}} </td>
                              <td> {{ $item->name}}</td>
                              <td> {{ $item->price}}</td>
                              <td> <img src="img/{{ $item->image}}" width="60px" alt=""> </td>
                              <td class="d-flex ">
                                    <a href="{{ route('product.edit',$item->id) }}">
                                          <button class="btn btn-warning text-light" >Edit</button>
                                    </a>
                                    &nbsp;
                                    <form action=" {{ route('product.delete',$item->id) }}" method="post">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                              </td>
                        </tr>
                        @endforeach
                       </tbody>
              </table>
        </div>


@endsection