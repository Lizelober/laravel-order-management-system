@extends('products.layout') @section('content')

<div class="flex ...">
  <div class="mx-auto w-3/5">
    <p class="text-xl text-gray-800 font-bold pt-12 mb-8">Products</p>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-hover">
      <tr>
        <th>No</th>
        <th>Image</th>
        <th>Product Name</th>
        <th>Product Price</th>
        <th>Action</th>
        <th></th>
      </tr>
      @foreach ($products as $product)
      <tr>
        <td>{{ ++$i }}</td>
        <td><img src="{{ Storage::url($product->image) }}" height="75" width="75" alt="" /></td>
        <td>{{ $product->product_name }}</td>
        <td>{{ $product->product_price_rand }}</td>

        <td>
          <form
            action="{{ route('products.destroy',$product->id) }}"
            method="POST"
          >
            <a
              class="btn btn-info"
              href="{{ route('products.show',$product->id) }}"
              >Show</a
            >

            <a
              class="btn btn-primary"
              href="{{ route('products.edit',$product->id) }}"
              >Edit</a
            >

            @csrf @method('DELETE')

            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </table>
    {!! $products->links() !!}

    <div class="pull-right">
      <a class="btn btn-success" href="{{ route('products.create') }}">
        Create New Product</a
      >
    </div>
  </div>
</div>

@endsection
