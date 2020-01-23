@extends('layouts.panel')

@section('content')

<div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Agents</h3>
                </div>
                <div class="col text-right">
                  <a href="{{ url('agents/create') }}" class="btn btn-sm btn-success">New Agent</a>
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
                    @foreach($agents as $agent )
                        <tr>
                            <th scope="row">
                            {{$agent->name}}
                            </th>
                            <td>
                            {{$agent->email}}
                            </td>
                            
                            <td>
                              {{$agent->dni}}
                            </td>

                            <td>
                            
                            <form action="{{ url('/agents/'.$agent->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{ url('/agents/'.$agent->id.'/edit') }}" class="btn btn-sm btn-primary">Edit</a>
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
