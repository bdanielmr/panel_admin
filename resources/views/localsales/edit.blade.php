@extends('layouts.panel')

@section('content')

<div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">New Local Agent</h3>
                </div>
                <div class="col text-right">
                  <a href="{{ url('localsales') }}" class="btn btn-sm btn-success">Cancell and Go back</a>
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
                <form action="{{ url('localsales/'.$localsales->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name of Local Sale Agent</label>
                        <input type="text" name="name" class="form-control" value="{{ old( 'name', $localsales->name ) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" value="{{ old( 'email', $localsales->email ) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input type="text" name="dni" class="form-control" value="{{ old( 'dni', $localsales->dni ) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control" value="{{ old( 'address', $localsales->address ) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" class="form-control" value="{{ old( 'phone', $localsales->phone ) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" name="password" class="form-control" value="{{Str::random(6)}}" required>
                    </div>

                    <button type="submit" class="btn btn-default">
                        Save
                    </button>
                </form>
            </div>
          </div>



@endsection
