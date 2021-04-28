@extends('layouts.app')

@section('content')
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
                 <!--div class="card-header card-header-primary">
                  <h4 class="card-title ">Profesores </h4>
                  <p class="card-category"> Lista de todos los profersores</p>
                  <div class="col text-right">
                  <a href="{{ url('teachers/create') }}" class="btn btn-sm btn-secondary">Nuevo</a>
                </div--> 
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
                        Nombre
                      </th>
                      <th>
                        Correo
                      </th>
                      <th>
                        Nivel
                      </th>
                      <th>
                        Opciones
                      </th>
                    </thead>
                    <tbody>
                      @foreach ($teachers as $teacher)
                      <tr>
                        <td>
                          1
                        </td>
                        <td>
                          {{ $teacher->name }}
                        </td>
                        <td>
                          {{ $teacher->email }}
                        </td>
                        <td>
                          {{ $teacher->level }}
                        </td>
                        <td>
                          
                          <form action="{{ url('teachers/'.$teacher->id) }}" method="POST">
                          @csrf()
                          @method('DELETE')

                          <a href="{{ url('teachers/'.$teacher->id.'/edit') }}" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons"  title="Editar" >edit</i></a>
                            
                          <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons">close</i>
                          </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="card-body">
                {{ $teachers->links() }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection