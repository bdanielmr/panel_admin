@extends('layouts.panel')

@section('content')

<div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Edit Agent</h3>
                </div>
                <div class="col text-right">
                  <a href="{{ url('agents') }}" class="btn btn-sm btn-success">Cancell and Go back</a>
                </div>
              </div>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <ul>
                         @foreach ($errors-> all() as $error)
                         <li>{{ $error}}</li>
                         @endforeach
                    </ul>
                @endif
                <form action="{{ url('agents/'.$agent->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name of Agent</label>
                        <input type="text" name="name" class="form-control" value="{{ old( 'name', $agent->name ) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" value="{{ old( 'email', $agent->email ) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input type="text" name="dni" class="form-control" value="{{ old( 'dni', $agent->dni ) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control" value="{{ old( 'address', $agent->address ) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" class="form-control" value="{{ old( 'phone', $agent->phone ) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" name="password" class="form-control" value="" required>
                        <p>Ingrese un valor solo si desea modificar la contraseña</p>
                    </div>

                    <button type="submit" class="btn btn-default">
                        Save
                    </button>
                </form>
            </div>
          </div>



@endsection
