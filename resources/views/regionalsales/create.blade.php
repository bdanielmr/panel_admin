@extends('layouts.panel')

@section('content')

<div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">New Regional Agent</h3>
                </div>
                <div class="col text-right">
                  <a href="{{ url('regionalsales') }}" class="btn btn-sm btn-success">Cancell and Go back</a>
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
                <form action="{{ url('regionalsales')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name of Regional Agent</label>
                        <input type="text" name="name" class="form-control" value="{{ old( 'name' ) }}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" value="{{ old( 'description' ) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input type="text" name="dni" class="form-control" value="{{ old( 'description' ) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control" value="{{ old( 'description' ) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Address</label>
                        <input type="text" name="phone" class="form-control" value="{{ old( 'description' ) }}" required>
                    </div>

                    <button type="submit" class="btn btn-default">
                        Save
                    </button>
                </form>
            </div>
          </div>



@endsection
