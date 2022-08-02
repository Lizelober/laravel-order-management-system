@extends('layouts.app')

@section('content')
<div class="flex ...">
    <div class="mx-auto w-3/5">
        <p class="text-xl text-gray-800 font-bold pt-12 mb-8">Orders</p>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <table class="table table-bordered">
            <tr>
                <th>Patient Name</th>
                <th>Patient Surname</th>
                <th>Order Price</th>
                <th>Quantity</th>
                <th>Order Paid</th>
            </tr>
            @foreach ($orders as $order)
            <tr>
                <td>{{ $order->name }}</td>
                <td>{{ $order->surname }}</td>
                <td>R{{ $order->order_price }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->order_paid_date }}</td>
                <td>
                </td>
            </tr>
            @endforeach
        </table>
        <button class="btn btn-success" type="submit"><a href="{{ route('orders.shop') }}">Add New Order</a></button>
        <!-- <button class="btn btn-success" type="submit"><a href="{{ route('shop') }}">Add New Order</a></button> -->
    </div>
</div>
@endsection