
@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Asignación de profesor para {{ $nameUser }} </h4>
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
                        <table  class="table">
                            <thead class=" text-primary">
                            <th>
                                Día
                            </th>
                            <th>
                                Hora inicio
                            </th>
                            <th>
                                Hora Fin
                            </th>
                            <th>
                                Profesor
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
                                    <div class="form-group col-md-6">
                                    <select name="doctor_id" id="doctor" class="form-control" required>
                                     @foreach($teachers as $teacher)  
                                      @foreach($teacher['teachers'] as $tea)  
        
                                        @if ($time['days'].$tim['start'] == $teacher['days'])
                                        <option value="{{ $tea['id'] }}" >{{ $tea['name'] }}</option>
                                        @endif
                                      @endforeach
                                     @endforeach
                                    </select>
                                    </div>
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