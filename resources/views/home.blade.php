@extends('layout.mainlayout') @section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __("Dashboard") }}</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session("status") }}
          </div>
          @endif
        </div>

        <div class="card-body">
          <a
            class="nav-link"
            href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"
          >
           {{ __("Add New Patient ") }} 
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
