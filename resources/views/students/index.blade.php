@extends('layouts.app')

@section('content')
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">Estudiantes <a href="{{ url('students/create') }}" class="btn btn-primary btn-round">Nuevo</a></h4>
                <p class="card-category"> Lista de todos los estudiantes activos</p>
                
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
                        <td>
                          
                          <form action="{{ url('students/'.$student->id) }}" method="POST">
                          @csrf()
                          @method('DELETE')
                          <a href="{{ url('students/'.$student->id.'/edit') }}" class="btn btn-primary btn-round">Editar</a>
                          <button type="submit" class="btn btn-primary btn-round">Eliminar</button>
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