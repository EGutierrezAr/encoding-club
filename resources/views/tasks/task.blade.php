@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
        <!-- <div class="row">
            <div class="col-md-12">
                <div class="card">

                <h1 style="margin-left:40px; text-align:center"><strong><span style="color:#9b59b6"><span style="font-size:16px">Por qu&eacute; es importante la retroalimentaci&oacute;n?</span></span></strong></h1>
                <p style="margin-left:40px">En EncodingClub estamos monitoreando constantemente el desarrollo de nuestros estudiantes para medir el progreso en cada una de nuestras clases y proporcionar un mejor apoyo deacuerdo a sus necesidades.</p>
                <hr />
                <p style="margin-left:40px">Estudiante: <strong>Juan Per&eacute;z</strong></p>
                <p style="margin-left:40px">Nivel: <strong>B&aacute;sico</strong></p>
                <p style="margin-left:40px">Clase: <strong>01</strong></p>
                <p style="margin-left:40px">Nombre del proyecto: <strong>Ciudad Inteligente</strong></p>
                <hr />
                </div>
            </div>
        </div> -->
        @if(session('notification'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="material-icons">close</i>
            </button>
            <span>
                <b> Muy bien - </b>{{ session('notification')}} </span>
        </div>
        @endif

        <nav class="navbar  bg-rose  text-center">
            <div class="container">
                <span class="navbar-text">
                Tarea {{ $lessons->lesson_number }} : {{ $lessons->homework }}
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
                            <li class="list-group-item">Estudiante: <strong>{{ $student->name}} {{ $student->last_name}}</strong></li>
                            <li class="list-group-item">Nivel: <strong>{{ $level->level }}</strong></li>
                            <li class="list-group-item">Clase: <strong>{{ $lessons->lesson_number }}</strong></li>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header-rose">
                        <p class="category">Temas:</p>
                    </div>
                    <div class="card-body">
                    <div class="row">
                        <div class="col">
                            @if ($lessons->topic_1 != null)
                            <li class="list-group-item">1.- {{ $lessons->topic_1 }}</strong></li>
                            @endif
                            @if ($lessons->topic_2 != null)
                            <li class="list-group-item">2.- {{ $lessons->topic_2 }}</strong></li>
                            @endif
                            @if ($lessons->topic_3 != null)
                            <li class="list-group-item">3.- {{ $lessons->topic_3 }}</li>
                            @endif
                        </div>
                        <div class="col">
                            @if ($lessons->topic_4 != null)
                            <li class="list-group-item">4.- {{ $lessons->topic_4 }}</strong></li>
                            @endif
                            @if ($lessons->topic_5 != null)
                            <li class="list-group-item">5.- {{ $lessons->topic_5 }}</strong></li>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                     <?php include public_path() . '\assets\tasks\/'.$file; ?> 
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header card-header-rose">
                        <p class="category">Monedas de Recompesa!</p>
                        <div class="col text-right">
                            <i class="material-icons">emoji_events</i>
                            <i class="material-icons">emoji_events</i>
                            <i class="material-icons">emoji_events</i>
                        </div>
                    </div>
                    <div class="card-body">
                        <li class="list-group-item">Tarea =      <img alt="una" src="{{ asset('../../img/coin.png') }}" style="height:25px; width:25px" /> </li>
                        <li class="list-group-item">Tarea + OA 1 = <img alt="una" src="{{ asset('../../img/coin2.png') }}" style="height:25px; width:50px" /></li>
                        <li class="list-group-item">Tarea + OA 1 + OA 2 = <img alt="una" src="{{ asset('../../img/coin3.png') }}" style="height:25px; width:75px" /></li>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">access_time</i> OA = Objetivo Adicional
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header card-header-rose">
                        <p class="category">Subir Tarea</p>
                        <div class="col text-right">
                        </div>
                    </div>
                    <form action="{{ url('task') }}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                                <div class="col-md-12">
                                <div class="form-group">
                                    <label>Pegar URL</label>
                                    <div class="form-group">
                                    <textarea class="form-control" value="{{ old('observation') }}" name="observation" rows="3"></textarea>
                                    </div>
                                </div>
                                </div>
                    </div>
                    <div class="col-md-12">
                        <label for="formFile" class="form-label">Archivo de Tarea:</label>
                        <input class="form-control" type="file" name="file" id="file">
                    </div>
                    <input type="hidden"  id="studentId" name="studentId" value="{{$student->id}}"></input>
                    <input type="hidden"  id="levelId" name="levelId" value="{{$level->id}}"></input>
                    <input type="hidden"  id="lessonId" name="lessonId" value="{{$lessons->id}}"></input>
                    <button type="submit" class="btn btn-primary pull-right">Finalizar tarea</button>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">access_time</i> Finalizar tarea para que la miss pueda revisar
                        </div>
                    </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

