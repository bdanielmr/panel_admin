@extends('layouts.panel')

@section('content')

<div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Product Type</h3>
                </div>
                <div class="col text-right">
                  <a href="{{ url('producttypes/create') }}" class="btn btn-sm btn-success">New Product</a>
                </div>
              </div>
            </div>
            @if(session('notification'))
            <div class="card-body">
              <div class="alert alert-success" role="alert">
                  <strong>{{session('notification')}}</strong>
              </div>
            </div>
            @endif
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Options</th>
                    
                  </tr>
                </thead>
                <tbody>
                    @foreach($producttypes as $producttype )
                        <tr>
                            <th scope="row">
                            {{$producttype->name}}
                            </th>
                            <td>
                            {{$producttype->description}}
                            </td>

                            <td>
                            
                            <form action="{{ url('/producttypes/'.$producttype->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{ url('/producttypes/'.$producttype->id.'/edit') }}" class="btn btn-sm btn-primary">Edit</a>
                            <button class="btn btn-sm btn-danger" type="submit">Remove</a>
                            </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
              </table>
            </div>
          </div>



@endsection
