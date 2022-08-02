@extends('orders.layout') @section('content')
<div class="flex ...">
  <div class="mx-auto w-3/5">
    <p class="text-xl text-gray-800 font-bold pt-12 mb-8">Update Order</p>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
    @endif 
    @if ($errors->any())
    <div class="alert alert-danger">
      <strong>Whoops!</strong> There were some problems with your input.<br /><br />
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <table class="table table-hover">
    <tr>
      <form
        action="{{ route('orders.update',$order->id) }}"
        method="POST"
        enctype="multipart/form-data"
      >
        @csrf @method('PUT')
        
          <td>Date Of Payment:</td>
          <td>
            <input
              type="date"
              name="order_paid_date"
              value="{{ $order->order_paid_date }}"
              class="form-control"
            />
            @error('order_paid_date')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
          </td>
        </tr>

        <tr>
          <td>
            <button type="submit" class="btn btn-primary">Submit</button>
          </td>
        </tr>
      </form>
    </table>
    <div class="pull-right">
      <a class="btn btn-primary" href="{{ route('orders.index') }}"> Back</a>
    </div>
  </div>
  @endsection
</div>
