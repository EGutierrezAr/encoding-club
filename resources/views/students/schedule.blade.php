@extends('layouts.app')

@section('content')
  <div class="content">
    <div class="container-fluid">
        <div class="row">
                    <div class="col-md-12">
                    <form action="{{ url('/students/'.$id.'/schedule') }}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-header card-header-warning">
                        <h4 class="card-title ">Horario del estudiante {{ $nameUser }}</h4>
                        <div class="col text-right">
                        <button type="submit" class="btn btn-sm btn-secondary">
                            Guardar cambios
                        </button>
                        </div>
                        </div>
                        <div class="card-body">
                            @if (session('notification'))
                            <div class="alert alert-success" role="alert">
                                {{ session('notification') }}
                            </div>
                            @endif

                            @if (session('errors'))
                            <div class="alert alert-danger" role="alert">
                                Los cambios se han guardado pero tener en cuenta que:
                                <ul>
                                @foreach (session('errors') as $error)
                                <li> {{ $error}} </li> 
                                @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table  class="table">
                            <thead class=" text-primary">
                                <tr>
                                <th>Día</th>
                                <th>Activo</th>
                                <th>Turno matutino inicio</th>
                                <th>Turno matutino fin</th>
                                <th>Turno vespertino inicio</th>
                                <th>Turno vespertino fin</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($workDays as $key => $workDay)  
                                <tr>
                                <td> {{ $days[$key] }} </td>
                                <td>
                                    <label class="custom-toggle">
                                    <input type="checkbox" name="active[]" value="{{ $key }}"
                                    @if($workDay->active) checked @endif()>
                                    <span class="custom-toggle-slider rounded-circle"></span>
                                    </label>
                                </td>
                            
                                <td>
                                    
                                    <div class="col-md-10">
                                        <div class="form-group">
                                        <!--div class="col"-->
                                        <select class="form-control" name="morning_start[]">
                                            @for ($i=8; $i<=11 ; $i++)
                                            <option value="{{ ($i<10 ? '0' : '') . $i }}:00" 
                                            @if($i.':00 AM' == $workDay->morning_start) selected @endif>
                                            {{ $i }}:00 AM
                                                </option>
                                            @endfor 
                                        </select>
                                        </div>
                                    </div>
                                    </td>
                                    <td>
                                    <div class="col-md-10">
                                        <div class="form-group">
                                        <select class="form-control" name="morning_end[]">
                                            @for ($i=8; $i<=12; $i++)
                                            <option value="{{ ($i<10 ? '0' : '') . $i }}:00"
                                                @if($i.':00 AM' == $workDay->morning_end) 
                                                selected 
                                                @elseif($i.':00 PM' == $workDay->morning_end) 
                                                selected 
                                                @endif>
                                                {{ ($i == 12 ? '12:00 PM' : $i.':00 AM' )}}
                                            </option>
                                            @endfor 
                                        </select>
                                        </div>
                                    </div>
                                
                                </td>
                                <td>
                                    <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                        <select class="form-control" name="afternoon_start[]">

                                            <option value="12:00"
                                                @if($i.':00 PM' == $workDay->afternoon_start) selected @endif>
                                            12:00 PM
                                            </option>

                                            @for ($i=1; $i<=9 ; $i++)
                                            <option value="{{ ($i<10 ? '0' : '') . $i}}:00"
                                                @if($i.':00 AM' == $workDay->afternoon_start) selected @endif>
                                                {{ $i }}:00 PM
                                            </option>
                                            @endfor 
                                        </select>
                                        </div>
                                    </div>
                                    </td>
                                <td>
                                    <div class="col-md-10">
                                        <div class="form-group">
                                        <select class="form-control" name="afternoon_end[]">
                                            <option value="12:00"
                                                @if($i.':00 PM' == $workDay->afternoon_start) selected @endif>
                                            12:00 PM
                                            </option>
                                            @for ($i=1; $i<=9 ; $i++)
                                            <option value="{{ ($i<10 ? '0' : '') . $i}}:00"
                                                @if($i.':00 AM' == $workDay->afternoon_end) selected @endif>
                                                {{ $i }}:00 PM
                                            </option>
                                            @endfor 
                                        </select>
                                        </div>
                                    </div>
                                    </div>  
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                    </form>
                    </div>
                </div>
        </div>
  </div>
  
@endsection