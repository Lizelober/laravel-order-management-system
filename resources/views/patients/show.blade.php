@extends('patients.layout') @section('content')

<div class="flex ...">
  <div class="mx-auto w-3/5">
    <div class="grid sm:grid-cols-1 gap-2 pt-12 sm:pt-20 mx-auto w-4/5">
      <div>

        <h1 class="text-4xl text-gray-600 font-bold pb-8">
          Patient: {{ $patient->name }} {{ $patient->surname }}
        </h1>
      </div>
     
      <p class="font-bold text-l text-black pb-8">
        Email:
        <span class="text-red-500">
          {{ $patient->email }} </span
        >
      </p>
 
      <p class="font-bold text-l text-black pb-8">
        Country: <span class="text-red-500"> {{ $patient->country_name }}</span>
      </p>

      <p class="font-bold text-l text-black pb-8">
        Currency: <span class="text-red-500"> {{ $patient->currency_name }}</span>
      </p>

      <p class="font-bold text-l text-black pb-8">
        Order Price: <span class="text-red-500"> {{ $patient->order_price }}</span>
      </p>


    <div class="pull-right">
      <a class="btn btn-primary" href="{{ route('patients.index') }}"> Back</a>
    </div>
    @endsection
  </div>
</div>