
@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Asignación de profesor para {{ $student->name }} </h4>
                        <input type="hidden" id="studenId" value="{{ $student->id }}">
                        <div class="col text-right">
                        </div>
                    </div>
                    <div class="card-body">
                    @if(session('error'))
                    <div class="alert alert-warning">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">close</i>
                        </button>
                        <span>
                        <b> Error - </b>{{ session('error')}} </span>
                    </div>
                    @elseif(session('notification'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">close</i>
                        </button>
                        <span>
                        <b> Muy bien - </b>{{ session('notification')}} </span>
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table  class="table">
                            <thead class=" text-primary">
                            <th>
                                Día
                            </th>
                            <th>
                                Hora inicio
                            </th>
                            <th>
                                Hora fin
                            </th>
                            <th>
                                Profesor asignado
                            </th>
                            <th>
                                Profesores disponibles
                            </th>
                            <th>
                                Asignar profesor
                            </th>
                            </thead>
                            <tbody>
                            @foreach($datesTime as $time)  
                                @foreach($time['time'] as $tim)  
                                <tr>
                                    <td>
                                    {{  $time['days'] }} 
                                    </td>
                                    <td>
                                        {{  $tim['start'] }} 
                                    </td>
                                    <td>
                                        {{   $tim['end'] }} 
                                    </td>
                                    <td>
                                    @if($teacherNameDisplay != null)
                                        @foreach($teacherNameDisplay as $teacher)  
                                                @if ($time['days'].$tim['start'] == $teacher['days'])
            
                                                   {{ $teacher['teacherName']->name }}
            
                                                @endif
                                                @endforeach
                                    @endif
                                    </td>
                                    <td class="td-actions text-left">
                                    <div class="form-group col-md-9">
                                    <!--select name="teacher" id="teacher{{ $time['days'] }}{{ Str::substr($tim['start'],0,2) }}"   onchange="selectFunction('teacher{{ $time['days'] }}{{ Str::substr($tim['start'],0,2) }}')" class="form-control" required-->
                                    <select class="form-control selectpicker" data-style="btn btn-link" name="teacher" id="teacher{{ $time['days'] }}{{ Str::substr($tim['start'],0,2) }}"   onchange="selectFunction('teacher{{ $time['days'] }}{{ Str::substr($tim['start'],0,2) }}')" required>
                                    <option value="-1" selected>Seleccione un profesor</option>
                                    @if($teachers != null)
                                        @foreach($teachers as $teacher)  
                                            @foreach($teacher['teachers'] as $tea)  
            
                                            @if ($time['days'].$tim['start'] == $teacher['days'])
                                            <option value="{{ $tea['id'] }}" >{{ $tea['name'] }}</option>
                                            @endif
                                            
                                        @endforeach
                                        @endforeach
                                    @endif

                                    </div>
                                    </td>
                                    <td class="td-actions text-center">
                                    <form action="">
                                        <a href="-1/-1/-1/assingTeacher"  id="url{{ $time['days'] }}{{ Str::substr($tim['start'],0,2) }}" class="btn btn-primary btn-link btn-sm">
                                         <i class="material-icons"  title="Horario" >edit_calendar</i></a>
                                    </form>
                                    </td>
                                </tr>
                                @endforeach
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>   
        </div>
    </div>
</div>

@endsection

@section('scripts')

@endsection