@extends('orders.layout')

@section('content')

<div class="flex ...">
    <div class="mx-auto w-3/5">
        <p class="text-xl text-gray-800 font-bold pt-12 mb-8">Add New Order</p>

        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        
        @foreach ($orders as $order)
        @php $order->user_id @endphp
        @endforeach

        @foreach ($users as $user)
        @php $user->name @endphp
        @endforeach

        @foreach ($products as $product)
        @php $product->product_name @endphp
        @endforeach

        <form action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Patient Name:</strong>
                        <input type="text" name="user_id" value="{{ $user->name }}" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <strong>Product Name:</strong>
                        <input type="text" name="product_id" value="{{ $product->product_name }}" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <strong>Order Price:</strong>
                        <input type="text" name="order_price" value="{{ $order->order_price }}" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <strong>Quantity:</strong>
                        <input type="text" name="quantity" value="{{ $order->quantity }}" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <strong>Order Paid Date:</strong>
                        <input type="text" name="order_paid_date" value="{{ $order->order_paid_date }}" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="d-flex flex-row-mb-3">
                    <div class="p-2">
                        <button class="btn btn-primary" type="submit">Add</button>
                    </div>
                </div>

        </form>

    </div>

</div>

<div class="">
    <div class="p-2">
        <a class="btn btn-primary" href="{{ route('products.index') }}" type="button">Back</a>
    </div>
</div>
@endsection