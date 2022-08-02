@extends('currency_countries.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Laravel 9 CRUD Example from scratch - ItSolutionStuff.com</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('currencies.create') }}"> Create New Currency</a>
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
        <th>No</th>
        <th>Currency Name</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($currencies as $currency)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $currency->currency_name }}</td>
        <td>
            <form action="{{ route('currencies.destroy',$currency->id) }}" method="POST">

                <a class="btn btn-info" href="{{ route('currencies.show',$currency->id) }}">Show</a>

                <a class="btn btn-primary" href="{{ route('currencies.edit',$currency->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $currencies->links() !!}

@endsection