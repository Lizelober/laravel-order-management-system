@extends('carts.layout')

@section('content')
<div class="mx-auto w-4/5">
  <h1 class="text-5xl text-gray-800 font-bold pt-12 mb-8">
    Shopping Cart
  </h1>

  <hr class="border-1 border-gray-300">
</div>

<div class="flex flex-col mx-auto w-4/5">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subtotal</th>
              <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
            </tr>
          </thead>

          <tbody class="bg-white divide-y divide-gray-200">
            @php $total = 0 @endphp
            @if (session('cartItems'))
            @foreach(session('cartItems') as $id => $values)
            @php $total += $values['Price'] * $values['quantity'] * $values['exchange_rate'] @endphp
            <tr data-id="{{ $id }}">
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">

                  <div class="flex-shrink-0 h-10 w-10">
                  @php $image = $values['image'] @endphp
                    <img class="h-10 w-10 rounded-full" src="/img/{{ $image }}" width="100" height="100" class="img-responsive" />
                  </div>
                  <div class="text-sm font-medium text-gray-900">
                    {{ $values['product_name'] }}
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
              <div class="flex items-center">
              {{ $values['currency_sign'] }} {{ $values['Price'] * $values['exchange_rate'] }}
              </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
              <div class="flex items-center">
              {{ $values['quantity'] }}
              </div>
              </td>
              <td data-th="Subtotal" class="px-6 py-4 whitespace-nowrap">
              <div class="flex items-center">
             {{ $values['currency_sign'] }} {{ $values['Price'] * $values['quantity'] * $values['exchange_rate'] }}</div></td>
              <td class="actions" data-th="">
                <button class="btn btn-danger btn-sm" value="delete">
                  <a href="{{ route('remove.from.cart', $id) }}"><i class="fa fa-trash-o"></i>Remove</a>
                </button>
              </td>

            </tr>
            @endforeach
            <tfoot>
            <tr>
              <td colspan="5" class="text-right">
                <h3><strong>Total R {{ $total }}</strong></h3>
              </td>
            </tr>
            <tr>
              <td colspan="5" class="text-right">
                <a href="{{ url('shop') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                @php $user_id = Auth::user()->id @endphp 
                <button class="btn btn-success"><a href="{{ Route('carts.checkout' , ['id' => $id]) }}">Checkout</a></button>

              </td>
            </tr>
          </tfoot>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  @else
            <tr align="left" colspan="3">
              <td>
                Cart is Empty
              </td>
              
            </tr>
            @endif
</div>
@endsection