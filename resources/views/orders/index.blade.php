@extends('orders.layout') @section('content')
<div class="flex ...">
  <div class="mx-auto">
    <p class="text-xl text-gray-800 font-bold pt-12 mb-8">Orders</p>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-hover">
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Surname</th>
        <th>Product</th>
        <th>Order Price</th>
        <th>Quantity</th>
        <th>Order Paid</th>
        <th>Action</th>
        <th></th>
      </tr>
      @foreach ($orders as $order)
      <tr>
        <td>{{ $order->id }}</td>
        <td>{{ $order->name }}</td>
        <td>{{ $order->surname }}</td>
        <td>{{ $order->product_name }}</td>
        <td>{{ $order->currency_sign }} {{ $order->order_price }}</td>
        <td>{{ $order->quantity }}</td>
        <td>{{ $order->order_paid_date }}</td>
        <td>
          <form action="{{ route('orders.destroy',$order->id) }}" method="POST">
            <a
              class="btn btn-info"
              href="{{ route('orders.show', $order->id) }}"
              >Show</a
            >

            <a
              class="btn btn-primary"
              href="{{ route('orders.edit', $order->id) }}"
              >Edit</a
            >

            @csrf @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </table>
    {!! $orders->links() !!}

    <div class="pull-right">
      <a class="btn btn-success" href="{{ route('shop') }}">
        Create New Order</a
      >
    </div>
  </div>
</div>
@endsection
