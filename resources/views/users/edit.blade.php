@extends('users.layout')

@section('content')
<div class="flex ...">
  <div class="mx-auto w-3/5">
  <p class="text-xl text-gray-800 font-bold pt-12 mb-8">Edit Patient</p>
 

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

<form action="{{ route('users.edit',$user->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Surname:</strong>
                <input type="text" name="surname" value="{{ $user->surname }}" class="form-control" placeholder="Surname">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="email" name="email" value="{{ $user->email }}" class="form-control" placeholder="Email">
            </div>
        </div>

        @php
        $currency_countries = DB::table('currency_countries')->get();
        foreach ($currency_countries as $country) {
        $country->currency_name;
        $country->country_name;
        }
        @endphp
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Country:</strong>
                <select id="currency_country_id" name="currency_countries.id" class="form-select">
                    @foreach ($currency_countries as $country)
                    <option value="{{$country->id}}" @if($country->id == '') selected @endif>{{$country->country_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
<div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
        </div>
        </div>
        </div>
@endsection