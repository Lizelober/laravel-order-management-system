@extends('currency_countries.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show Currency</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('currencies.index') }}"> Back</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Currency Name:</strong>
            {{ $currency->currency_name }}
        </div>
    </div>
</div>
@endsection