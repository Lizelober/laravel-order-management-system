@extends('shop.layout')

@section('content')

<div class="mx-auto w-4/5">
    <h1 class="text-3xl text-gray-800 text-left font-bold pt-1 mb-1">
        Shop
    </h1>

    <hr class="border-1 border-gray-300">
</div>
<div class="grid sm:grid-cols-4 gap-8 pt-5 mx-auto w-4/5">
    @foreach ($products as $product)
    <div class="mx-auto">
        <img src="/img/{{ $product->image }}" alt="{{$product->product_name}}" style="height:100px !important;">

        <h2 class="text-ml text-gray-600 font-bold pb-4">
            {{$product -> product_name}}
        </h2>

        <p class="font-bold text-l text-black pb-4">
            Price: <span class="text-red-500">R {{ $product -> product_price_rand }}</span>
        </p>

        <a href="{{ Route('add.to.cart' , ['id' => $product->id])}}" class="px-6 py-2 text-sm uppercase text-white font-bold bg-blue-600 rounded-full w-full">
            Add To Cart
        </a>
    </div>
    @endforeach
</div>
@endsection