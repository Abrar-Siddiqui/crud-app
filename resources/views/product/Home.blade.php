@extends('product.index')
@section('contact')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-8 col-sm-10 col-12 my-3 card p-3 mx-auto">
                <table class="table">
                    <thead class="text-center">
                      <tr>
                        <th scope="col">Id No.</th>
                        <th scope="col">Name</th>
                        
                        <th scope="col">Images</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($product as $products)
                        <tr>
                            <th scope="row">{{ $loop->index+1 }}</th>
                            <td>{{ $products->name }}</td>
                            
                            <td>
                                <img src="products/{{ $products->image }}" class="rounded-circle" width="30" height="30"/>
                            </td>
                            <td>
                                <a href="edit/{{ $products->id }}" class="btn btn-warning btn-sm" >Edit</a>
                                <a href="delete/{{ $products->id }}" class="btn btn-danger btn-sm" >Delete</a>
                            </td>
                          </tr>
                            
                        @endforeach
                     
                      
                    </tbody>
                  </table>
                  {{ $product->links() }}
            </div>
        </div>
    </div>
@endsection