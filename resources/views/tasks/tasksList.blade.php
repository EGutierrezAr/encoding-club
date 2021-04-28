@extends('layouts.app')

@section('content')
<div class="content">
<div class="container-fluid">

    <nav class="navbar  bg-rose ">
            <div class="container ">
                <span class="navbar-text">
                Sección de tareas:
                </span>
            </div>
    </nav>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header card-header-icon card-header-danger">
                    <div class="card-icon">
                    <i class="material-icons">person_outline</i>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <li class="list-group-item">Estudiante: <strong>{{ $student->name}} {{ $student->last_name}}</strong></li>
                            <li class="list-group-item">Nivel: <strong>{{ $level->level }}</strong></li>
                        </div>
                        <div class="col">
                            <li class="list-group-item">Próxima Clase: <strong>{{ $nextClass }}</strong></li>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header card-header-rose">
                    <p class="category">Por qu&eacute; es importante la retroalimentaci&oacute;n?</p>
                </div>
                <div class="card-body">
                    En <strong><span style="color:#9b59b6"><span style="font-size:14px">EncodingClub</span></span></strong> estamos monitoreando constantemente el desarrollo de nuestros estudiantes para medir 
                    el progreso en cada una de nuestras clases y proporcionar un mejor apoyo deacuerdo a sus necesidades.
                
                </div>
                </div>
            </div>
        </div>
    </div>

<div class="col-lg-7 col-md-12">
        <div class="card">
        <div class="card-header card-header-tabs card-header-primary">
            <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <span class="nav-tabs-title">Lista de tareas:</span>
                <ul class="nav nav-tabs" data-tabs="tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#student" data-toggle="tab">
                    <i class="material-icons">bug_report</i> Estudiante
                    <div class="ripple-container"></div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#teacher" data-toggle="tab">
                    <i class="material-icons">code</i> Profesor
                    <div class="ripple-container"></div>
                    </a>
                </li>
                </ul>
            </div>
            </div>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane active" id="student">
                    <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Finalizada
                      </th>
                      <th>
                        Clase
                      </th>
                      <th>
                        Nombre de la Tarea
                      </th>
                      <th>
                        Ver tarea
                      </th>
                    </thead>
                    <tbody>
                         @foreach($lessons as $key => $lesson) 
                         
                         @if ($lesson -> homework != null)
                        <tr>
                            <td>
                                <div class="form-check">
                                <label class="form-check-label">
                                    @foreach($classes as $key => $class) 
                                    
                                    @if ($lesson->id == $class->lesson_id &&  $class->score_homework !=null)
                
                                    <input class="form-check-input" type="checkbox" value=""  checked>
                                    @else
                                    <input class="form-check-input" type="checkbox" value=""  >
                                    @endif
                                    @endforeach
                                    <span class="form-check-sign">
                                    <span class="check"></span>
                                    </span>
                                </label>
                                </div>
                            </td>
                            <td> {{ $lesson->lesson_number }}</td>
                            <td> {{ $lesson->homework }}</td>
                            <td><a href="/task/viewTask/{{  $lesson->file_homework }}"><i class="material-icons"  title="Ver tarea" >description</i> </a></td>
                            <!--td class="td-actions text-right">
                                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                <i class="material-icons">edit</i>
                                </button>
                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                <i class="material-icons">close</i>
                                </button>
                            </td-->
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                    </table>
                    <!-- <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal">
                    Finalizar
                    </button> -->
                </div>

                <div class="tab-pane" id="teacher">
                <table class="table">
                    <tbody>
                         @foreach($lessons as $key => $lesson)  
                        <tr>
                            <td>
                                <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="" >
                                    <span class="form-check-sign">
                                    <span class="check"></span>
                                    </span>
                                </label>
                                </div>
                            </td>
                            <td> {{ $lesson->homework }}</td>
                            <td><a href="{{ $lesson->file_homework }}/viewTask" target=”_blank” >Link</a></td>
                            <!--td class="td-actions text-right">
                                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                <i class="material-icons">edit</i>
                                </button>
                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                <i class="material-icons">close</i>
                                </button>
                            </td-->
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                    <!--button type="submit" class="btn btn-primary pull-right">Finalizar</button>
                        <div class="clearfix"></div-->
                    <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal">
                    Finalizar
                    </button>
                </div>
            </div>
        </div>
    </div>

    </div>
</div>

@endsection
