@extends('patients.layout')

@section('content')
<div class="mx-auto w-4/5">
    <p class="text-5xl text-gray-800 font-bold pt-12 mb-8">Add New Patient</p>

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

    <form action="{{ route('patients.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <strong>Name:</strong>
            <input type="text" name="name" class="form-control" placeholder="name">
        </div>

        <div class="form-group">
            <strong>Surname:</strong>
            <input type="text" name="surname" class="form-control" placeholder="surname">
        </div>

        <div class="form-group">
            <strong>Email:</strong>
            <input type="email" name="email" class="form-control" placeholder="email">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Select Country:</label>
            <select id="exampleFormControlSelect1" name="currency_countries.id" class="form-select">
                @foreach ($currency_countries as $country)
                <option value="{{$country->id}}">{{$country->country_name}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
        <a class="btn btn-primary" href="{{ route('patients.index') }}">Back</a>
    </div>
</div>
@endsectiony