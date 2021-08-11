@extends('layouts.app')

@section('content')
<div class="content">
<div class="container-fluid">
    <div class="row">
    <div class="col-md-12">
    <div class="card card-nav-tabs card-fluid">
    <div class="card-header card-header-info">
        <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
        @if(session('notification'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="material-icons">close</i>
                    </button>
                    <span>
                      <b> Muy bien - </b>{{ session('notification')}} </span>
                </div>
        @endif
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
            <span class="nav-tabs-title"></span>
                <ul class="nav nav-tabs" data-tabs="tabs">
                    <!--li class="nav-item">
                        <a class="nav-link " href="#monthAfter" data-toggle="tab">Mes <i class="material-icons">check_circle_outline</i></a>
                    </li-->
                    @if  ( $dayNumber == -2 )
                    <li class="nav-item">
                        <a class="nav-link active"  onclick="selectClassesListByDay(-2)" href="#weekAfter" placeholder="Search" data-toggle="tab"><i class="material-icons">first_page</i>Mes</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link"  onclick="selectClassesListByDay(-2)" href="#weekAfter" placeholder="Search" data-toggle="tab"><i class="material-icons">first_page</i>Mes</a>
                    </li>
                    @endif
                    @if  ( $dayNumber == -1 )
                    <li class="nav-item">
                        <a class="nav-link active"  onclick="selectClassesListByDay(-1)" href="#weekAfter" data-toggle="tab"><i class="material-icons">chevron_left</i>Semana</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link"  onclick="selectClassesListByDay(-1)" href="#weekAfter" data-toggle="tab"><i class="material-icons">chevron_left</i>Semana</a>
                    </li>
                    @endif
                    @if  ( $dayNumber == 0)
                    <li class="nav-item">
                        <a class="nav-link active"  onclick="selectClassesListByDay(0)" href="#weekAfter" data-toggle="tab"><i class="material-icons">expand_more</i>Semana</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link"  onclick="selectClassesListByDay(0)" href="#weekAfter" data-toggle="tab"><i class="material-icons">expand_more</i>Semana</a>
                    </li>
                    @endif
                    @if  ( $dayNumber == 1 )
                    <li class="nav-item">
                        <a class="nav-link active"  onclick="selectClassesListByDay(1)"  href="#Monday"  data-toggle="tab"> Lunes </a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" onclick="selectClassesListByDay(1)"  href="#Monday"  data-toggle="tab"> Lunes </a>
                    </li>
                    @endif
                    @if  ( $dayNumber == 2 )
                    <li class="nav-item">
                        <a class="nav-link active"  onclick="selectClassesListByDay(2)"  href="#Monday" data-toggle="tab"> Martes</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link"  onclick="selectClassesListByDay(2)"  href="#Monday" data-toggle="tab">Martes</a>
                    </li>
                    @endif
                    @if  ( $dayNumber == 3 )
                    <li class="nav-item">
                        <a class="nav-link active"  onclick="selectClassesListByDay(3)"  href="#Monday" data-toggle="tab"> Miércoles</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link"  onclick="selectClassesListByDay(3)"  href="#Monday" data-toggle="tab"> Miércoles</a>
                    </li>
                    @endif
                    @if  ( $dayNumber == 4 )
                    <li class="nav-item">
                        <a class="nav-link active"  onclick="selectClassesListByDay(4)"  href="#Monday" data-toggle="tab"> Jueves</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link"  onclick="selectClassesListByDay(4)"  href="#Monday" data-toggle="tab"> Jueves</a>
                    </li>
                    @endif
                    @if  ( $dayNumber == 5 )
                    <li class="nav-item">
                        <a class="nav-link active"  onclick="selectClassesListByDay(5)"  href="#Monday" data-toggle="tab"> Viernes</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link"  onclick="selectClassesListByDay(5)"  href="#Monday" data-toggle="tab"> Viernes</a>
                    </li>
                    @endif
                    @if  ( $dayNumber == 6 )
                    <li class="nav-item">
                        <a class="nav-link active"  onclick="selectClassesListByDay(6)"  href="#Monday" data-toggle="tab"> Sábado</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link"  onclick="selectClassesListByDay(6)"  href="#Monday" data-toggle="tab"> Sábado</a>
                    </li>
                    @endif
                    @if  ( $dayNumber == 8 )
                    <li class="nav-item">
                        <a class="nav-link active"  onclick="selectClassesListByDay(8)" href="#weekAfter" data-toggle="tab">Semana<i class="material-icons">chevron_right</i></a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link"  onclick="selectClassesListByDay(8)" href="#weekAfter" data-toggle="tab">Semana<i class="material-icons">chevron_right</i></a>
                    </li>
                    @endif
                    @if  ( $dayNumber == 9 )
                    <li class="nav-item">
                        <a class="nav-link active"  onclick="selectClassesListByDay(9)" href="#weekAfter" data-toggle="tab">Mes<i class="material-icons">last_page</i></a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link"  onclick="selectClassesListByDay(9)" href="#weekAfter" data-toggle="tab">Mes<i class="material-icons">last_page</i></a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <div class="card-body ">
        <div class="tab-content text-center">
            <div class="tab-pane active" id="Monday">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <th>
                      Profesor
                    </th>
                    <th>
                      Tel Profesor
                    </th>
                    <th>
                      Estudiante
                    </th>
                    <th>
                      Curso
                    </th>
                    <th>
                      Tutor
                    </th>
                    <th>
                      Tel Tutor
                    </th>
                    <th>
                      Hora
                    </th>
                    <th>
                      Tipo
                    </th>
                    <th>
                      Estatus
                    </th>
                  </thead>
                  <tbody>
                    @foreach ($appointments as $appointment)
                    <tr>
                      <td>
                        {{ $appointment->name.' '.$appointment->last_name}}
                      </td>
                      <td>
                        {{ $appointment->phone }}
                      </td>
                      <td>
                        {{ $appointment->student_name }}
                      </td>
                      <td>
                        {{ $appointment->level.' - '.$appointment->course }}
                      </td>
                      <td>
                        {{ $appointment->parent_name }}
                      </td>
                      <td>
                        {{ $appointment->parent_phone }}
                      </td>
                      <td>
                        {{ $appointment->time_start }}
                      </td>
                      <td>
                        {{ $appointment->type }}
                      </td>
                      <td>
                        {{ $appointment->status_appointment }}
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
        </div>
    </div>
  </div>
 

</div>
</div>
@endsection
