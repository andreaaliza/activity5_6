@extends('products.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>ITEWT - Activity 5&6</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('product.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>ProductId</th>
            <th>ProductCode</th>
            <th>ProductName</th>
            <th>Description</th>
            <th>Price</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $product->ProductId }}</td>
            <td>{{ $product->ProductCode }}</td>
            <td>{{ $product->ProductName }}</td>
            <td>{{ $product->Description }}</td>
            <td>{{ $product->Price }}</td>
            <td>
                <form action="{{ route('product.destroy',$product->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('product.show',$product->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('product.edit',$product->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $product->links() !!}
      
@endsection