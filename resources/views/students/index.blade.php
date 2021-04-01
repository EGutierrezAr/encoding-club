@extends('layouts.app')

@section('content')
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">Estudiantes </h4>
                <p class="card-category"> Lista de todos los estudiantes activos</p>
                <div class="col text-right">
                <a href="{{ url('students/create') }}" class="btn btn-sm btn-secondary">Nuevo</a>
                </div>
              </div>
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
                        Nombre
                      </th>
                      <th>
                        Correo
                      </th>
                      <th>
                        City
                      </th>
                      <th>
                        Opciones
                      </th>
                    </thead>
                    <tbody>
                      @foreach ($students as $student)
                      <tr>
                        <td>
                          1
                        </td>
                        <td>
                          {{ $student->name }}
                        </td>
                        <td>
                          {{ $student->email }}
                        </td>
                        <td>
                          Oud-Turnhout
                        </td>
                        <!--td>
                          <form action="{{ url('students/'.$student->id) }}" method="POST">
                          @csrf()
                          @method('DELETE')
                          <a href="{{ url('students/'.$student->id.'/edit') }}" class="btn btn-primary btn-round">Editar</a>
                          <button type="submit" class="btn btn-primary btn-round">Eliminar</button>
                          </form>
                        </td-->
                        <td class="td-actions text-left">
                          <form action="{{ url('students/'.$student->id) }}" method="POST">
                            @csrf()
                            @method('DELETE')
                            <a href="{{ url('students/'.$student->id.'/editSchedule') }}" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons"  title="Horario" >edit_calendar</i></a>
                            <a href="{{ url('students/'.$student->id.'/edit') }}" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons"  title="Editar" >edit</i></a>
                            <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons">close</i>
                            </button>
                            <a href="{{ url('students/'.$student->id.'/appointment') }}" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons"  title="Clase" >edit_calendar</i></a>
                          </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="card-body">
                {{ $students->links() }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection