@extends('layouts.app')

@section('content')
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
                <nav class="navbar navbar-expand-lg bg-primary">
                  <div class="container">
                      <span class="navbar-text">
                      <a class="navbar-brand" href=javascript:;">Lista de profesores</a>
                      </span>
                      <span class="navbar-text">
                      <a href="{{ url('teachers/create') }}" class="btn btn-sm btn-secondary">Nuevo</a>
                      </span>
                    
                        <div class="collapse navbar-collapse">
                            <form class="form-inline ml-auto" action="{{ route('teachers/find') }}" method="GET">
                            @csrf()
                            @method('find')
                                <div class="form-group no-border">
                                  <input type="text" id="search" name="search"  class="form-control" placeholder="Search">
                                </div>
                                <button type="submit" class="btn btn-just-icon btn-round">
                                  <i class="material-icons">search</i>
                                </button>
                            </form>
                        </div>
                    </div>
                </nav>

              <div class="card-body">
                @if(session('notification'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="material-icons">close</i>
                    </button>
                    <span>
                      <b> Muy bien - </b>{{ session('notification')}} </span>
                </div>
                @endif
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        ID
                      </th>
                      <th>
                        Estudiante
                      </th>
                      <th>
                        Día
                      </th>
                      <th>
                        Hora
                      </th>
                      <th>
                        Tipo
                      </th>
                      <th>
                        Nivel
                      </th>
                      <th>
                        Estatus
                      </th>
                    </thead>
                    <tbody>
                      @foreach ($appointments as $appointment)
                      <tr>
                        <td>
                          1
                        </td>
                        <td>
                          {{ $appointment->name.' '.$appointment->last_name}}
                        </td>
                        <td>
                          {{ $appointment->date }}
                        </td>
                        <td>
                          {{ $appointment->time_start }}
                        </td>
                        <td>
                          {{ $appointment->type }}
                        </td>
                        <td>
                        @if ($appointment->level == 1)
                         Básico
                        @elseif ($appointment->level == 2)
                         Medio
                         @elseif ($appointment->level == 3)
                         Avanzado
                        @endif
                        </td>
                        <td>
                          {{ $appointment->status_appointment }}
                        </td>
                        <td>
                      
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="card-body">
                {{ $appointments->links() }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection