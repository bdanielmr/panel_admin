@extends('layouts.panel')

@section('content')

<div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Regional Sale</h3>
                </div>
                <div class="col text-right">
                  <a href="{{ url('regionalsales/create') }}" class="btn btn-sm btn-success">New Regional Sale Agent</a>
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
                    <th scope="col">E-mail</th>
                    <th scope="col">Dni</th>
                    <th scope="col">Options</th>
                    
                  </tr>
                </thead>
                <tbody>
                    @foreach($regionalsales as $regionalsale )
                        <tr>
                            <th scope="row">
                            {{$regionalsale->name}}
                            </th>
                            <td>
                            {{$regionalsale->email}}
                            </td>
                            
                            <td>
                              {{$regionalsale->dni}}
                            </td>

                            <td>
                            
                            <form action="{{ url('/regionalsales/'.$regionalsale->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{ url('/regionalsales/'.$regionalsale->id.'/edit') }}" class="btn btn-sm btn-primary">Edit</a>
                            <button class="btn btn-sm btn-danger" type="submit">Remove</a>
                            </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
              </table>
            </div>
            <div class="card-body">
            {{$regionalsales->links()}}
            </div>
          </div>



@endsection
