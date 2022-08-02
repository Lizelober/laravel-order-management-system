@extends('products.layout')

@section('content')
<div class="flex ...">
  <div class="mx-auto w-3/5">
  <p class="text-xl text-gray-800 font-bold pt-12 mb-8">Show Product</p>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $product->product_name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Price:</strong>
            R{{ $product->product_price_rand }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Image:</strong>
            <img src="{{ Storage::url($product->image) }}" height="200" width="200" alt="" />
        </div>
    </div>
</div>
    <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
        </div>
    </div>

</div>
@endsection