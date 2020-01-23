@extends('layouts.panel')

@section('content')

<div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Local Sale</h3>
                </div>
                <div class="col text-right">
                  <a href="{{ url('localsales/create') }}" class="btn btn-sm btn-success">New Local Sale Agent</a>
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
                    @foreach($localsales as $localsale )
                        <tr>
                            <th scope="row">
                            {{$localsale->name}}
                            </th>
                            <td>
                            {{$localsale->email}}
                            </td>
                            
                            <td>
                              {{$localsale->dni}}
                            </td>

                            <td>
                            
                            <form action="{{ url('/localsales/'.$localsale->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{ url('/localsales/'.$localsale->id.'/edit') }}" class="btn btn-sm btn-primary">Edit</a>
                            <button class="btn btn-sm btn-danger" type="submit">Remove</a>
                            </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
              </table>
            </div>
            <div class="card-body">
            {{$localsales->links()}}
            </div>
            
          </div>



@endsection
