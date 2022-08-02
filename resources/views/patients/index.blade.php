@extends('patients.layout') @section('content')
<div class="flex ...">
  <div class="mx-auto w-3/5">
    <p class="text-xl text-gray-800 font-bold pt-12 mb-8">Patients</p>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-hover">
      <tr>
        <th>Name</th>
        <th>Surname</th>
        <th>Email</th>
        <th>Country Name</th>
        <th>Currency Name</th>
        <!-- <th width="280px">Action</th> -->
      </tr>
      @foreach ($users as $user)
      <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->surname }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->country_name }}</td>
        <td>{{ $user->currency_name }}</td>
        <td>
          <form
            action="{{ route('patients.destroy',$user->id) }}"
            method="POST"
          >
            <a
              class="btn btn-info"
              href="{{ route('patients.show',$user->id) }}"
              >Show</a
            >

            <a
              class="btn btn-primary"
              href="{{ route('patients.edit',$user->id) }}"
              >Edit</a
            >

            @csrf @method('DELETE')

            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </table>
 {!! $users->links() !!}

 <div class="pull-right">
      <a class="btn btn-success" href="{{ route('register') }}">
        Add New Patient</a
      >
    </div>

    
  </div>
</div>

@endsection
