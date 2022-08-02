@extends('orders.layout') @section('content')
<div class="flex ...">
  <div class="mx-auto w-3/5">
    @foreach ($orders as $order)
    <div class="grid sm:grid-cols-1 gap-2 pt-12 sm:pt-20 mx-auto w-4/5">
      <div>
        <h1 class="text-4xl text-gray-600 font-bold pb-8">
          {{ $order->product_name }}
        </h1>
      </div>
      <div class="mx-auto">
        <img
          src="/img/{{ $order->image }}"
          alt="{{$order->product_name}}"
          style="height: 150px !important"
        />
      </div>

      <p class="font-bold text-l text-black pb-8">
        Patient:
        <span class="text-red-500">
          {{ $order->name }} {{ $order->surname }}</span
        >
      </p>

      <p class="font-bold text-l text-black pb-8">
        Price:
        <span class="text-red-500">
          {{ $order->currency_sign }} {{ $order->order_price }}</span
        >
      </p>

      <p class="font-bold text-l text-black pb-8">
        Quantity: <span class="text-red-500"> {{ $order->quantity }}</span>
      </p>

      <p class="font-bold text-l text-black pb-8">
        Paid: <span class="text-red-500"> {{ $order->order_paid_date }}</span>
      </p>

      @endforeach
    </div>
    <div class="pull-right">
      <a class="btn btn-primary" href="{{ route('orders.index') }}"> Back</a>
    </div>
    @endsection
  </div>
</div>
