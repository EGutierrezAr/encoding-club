@extends('layouts.app')

@section('content')
<div class="content">
<div class="container-fluid">
    <div class="row">
    <div class="col-md-11">
    <div class="card card-nav-tabs card-plain">
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
            <span class="nav-tabs-title"><a>Clases :</a></span>
                <ul class="nav nav-tabs" data-tabs="tabs">
                    @foreach($lessons as $key => $lesson)  
                    <li class="nav-item">
                        @if ( $lesson->lesson_number == $noActualClass)
                        <!--a class="nav-link active" href="#".{{ $lesson->lesson_number }} data-toggle="tab"> classe {{ $lesson->lesson_number }} </a-->
                        <a class="nav-link active" href="#{{ $lesson->lesson_number }}" data-toggle="tab"> <i class="material-icons">south</i>  &nbsp;&nbsp;{{ $lesson->lesson_number }} &nbsp;&nbsp;   </a>
                        @elseif ( $lesson->lesson_number < $noActualClass)
                        <a class="nav-link " href="#{{ $lesson->lesson_number }}" data-toggle="tab"> <i class="material-icons">check_circle_outline</i> &nbsp;&nbsp;{{ $lesson->lesson_number }}&nbsp;&nbsp; </a>
                        @else
                        <a class="nav-link " href="#{{ $lesson->lesson_number }}" data-toggle="tab"> &nbsp;&nbsp;{{ $lesson->lesson_number }}&nbsp;&nbsp; </a>
                        @endif
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div><div class="card-body ">
        <div class="tab-content text-center">
            @foreach($lessons as $key => $lesson)  
                @if ( $lesson->lesson_number == $noActualClass)
                    <div class="tab-pane active" id={{ $lesson->lesson_number }}>
                @else
                    <div class="tab-pane" id={{ $lesson->lesson_number }}>
                @endif
                    <div class="alert alert-info col text-left">
                        <span class="nav-tabs-title"><a>Temas :</a></span>

                        @if ( $lesson->lesson_number < $noActualClass)
                            @if ($lesson->topic_1 != null)
                            <!--p> <i class="material-icons">check_circle_outline</i> Tema: <strong>{{ $lesson->topic_1 }} </strong></p-->
                            <span class="nav-tabs-title"><a> <i class="material-icons">check_circle_outline</i> {{ $lesson->topic_1 }}</a></span>
                            @endif
                            @if ($lesson->topic_2 != null)
                            <span class="nav-tabs-title"><a><i class="material-icons">check_circle_outline</i> {{ $lesson->topic_2 }}</a></span>
                            @endif
                            @if ($lesson->topic_3 != null)
                            <span class="nav-tabs-title"><a><i class="material-icons">check_circle_outline</i> {{ $lesson->topic_3 }}</a></span>
                            @endif
                            @if ($lesson->topic_4 != null)
                            <span class="nav-tabs-title"><a><i class="material-icons">check_circle_outline</i> {{ $lesson->topic_4 }}</a></span>
                            @endif
                            @if ($lesson->topic_5 != null)
                            <span class="nav-tabs-title"><a><i class="material-icons">check_circle_outline</i> {{ $lesson->topic_5 }}</a></span>
                            @endif
                        @else
                            @if ($lesson->topic_1 != null)
                            <!--p> <i class="material-icons">check_circle_outline</i> Tema: <strong>{{ $lesson->topic_1 }} </strong></p-->
                            <span class="nav-tabs-title"><a> &nbsp;&nbsp;{{ $lesson->topic_1 }}</a></span>
                            @endif
                            @if ($lesson->topic_2 != null)
                            <span class="nav-tabs-title"><a> &nbsp;&nbsp;{{ $lesson->topic_2 }}</a></span>
                            @endif
                            @if ($lesson->topic_3 != null)
                            <span class="nav-tabs-title"><a> &nbsp;&nbsp;{{ $lesson->topic_3 }}</a></span>
                            @endif
                            @if ($lesson->topic_4 != null)
                            <span class="nav-tabs-title"><a> &nbsp;&nbsp;{{ $lesson->topic_4 }}</a></span>
                            @endif
                            @if ($lesson->topic_5 != null)
                            <span class="nav-tabs-title"><a> &nbsp;&nbsp;{{ $lesson->topic_5 }}</a></span>
                            @endif
                        @endif
                    </div>
                </div>
            @endforeach
            <!--div class="tab-pane" id="updates">
                <p> I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus. I think that&#x2019;s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. I think that&#x2019;s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. </p>
            </div>
            <div class="tab-pane" id="history">
                <p> I think that&#x2019;s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus. I think that&#x2019;s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at.</p>
            </div-->
        </div>
    </div>
  </div>
 

    <div class="col-lg-7 col-md-12">
        <div class="card">
        <div class="card-header card-header-tabs card-header-primary">
            <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <span class="nav-tabs-title">Actividades:</span>
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
                <li class="nav-item">
                    <a class="nav-link" href="#score" data-toggle="tab">
                    <i class="material-icons">code</i> Calificar
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
                    <tbody>
                        @if($actualClass->activity_1 != null)
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
                            <td><a href="http://{{ $actualClass->activity_1 }}" target=”_blank” >{{ $actualClass->activity_1 }}</a></td>
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
                        @if($actualClass->activity_2 != null)
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
                            <td> {{ $actualClass->activity_2 }}</td>
                        </tr>
                        @endif
                        @if($actualClass->activity_3 != null)
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
                            <td> {{ $actualClass->activity_3 }}</td>
                        </tr>
                        @endif
                        @if($actualClass->activity_4 != null)
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
                            <td> {{ $actualClass->activity_4 }}</td>
                        </tr>
                        @endif
                        @if($actualClass->activity_5 != null)
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
                            <td> {{ $actualClass->activity_5 }}</td>
                        </tr>
                        @endif
                    </tbody>
                    </table>
                    <!--button type="submit" class="btn btn-primary pull-right">Finalizar</button>
                        <div class="clearfix"></div-->
                    <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal">
                    Finalizar
                    </button>
                </div>

                <div class="tab-pane" id="teacher">
                <table class="table">
                    <tbody>
                        @if($actualClass->activity_1 != null)
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
                            <td><a href="http://{{ $actualClass->activity_1 }}" target=”_blank” >{{ $actualClass->activity_1 }}</a></td>
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
                        @if($actualClass->activity_2 != null)
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
                            <td> {{ $actualClass->activity_2 }}</td>
                        </tr>
                        @endif
                        @if($actualClass->activity_3 != null)
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
                            <td> {{ $actualClass->activity_3 }}</td>
                        </tr>
                        @endif
                        @if($actualClass->activity_4 != null)
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
                            <td> {{ $actualClass->activity_4 }}</td>
                        </tr>
                        @endif
                        @if($actualClass->activity_5 != null)
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
                            <td> {{ $actualClass->activity_5 }}</td>
                        </tr>
                        @endif
                    </tbody>
                    </table>
                    <!--button type="submit" class="btn btn-primary pull-right">Finalizar</button>
                        <div class="clearfix"></div-->
                    <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal">
                    Finalizar
                    </button>
                </div>

                <div class="tab-pane" id="score">
                    <table class="table">
                    <tbody>
                        <tr>
                        <td>
                            <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                <span class="check"></span>
                                </span>
                            </label>
                            </div>
                        </td>
                        <td>Nivel de contración del estudiante</td>
                        <td class="td-actions text-right">
                            <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons">edit</i>
                            </button>
                            <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">close</i>
                            </button>
                        </td>
                        </tr>
                        <tr>
                        <td>
                            <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                <span class="check"></span>
                                </span>
                            </label>
                            </div>
                        </td>
                        <td>Nivel de contración del estudiante</td>
                        <td class="td-actions text-right">
                            <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons">edit</i>
                            </button>
                            <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">close</i>
                            </button>
                        </td>
                        </tr>
                        <tr>
                        <td>
                            <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                <span class="check"></span>
                                </span>
                            </label>
                            </div>
                        </td>
                        <td>Nivel de contración del estudiante</td>
                        <td class="td-actions text-right">
                            <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons">edit</i>
                            </button>
                            <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">close</i>
                            </button>
                        </td>
                        </tr>
                        <tr>
                        <td>
                            <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                <span class="check"></span>
                                </span>
                            </label>
                            </div>
                        </td>
                        <td>Nivel de contración del estudiante</td>
                        <td class="td-actions text-right">
                            <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons">edit</i>
                            </button>
                            <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">close</i>
                            </button>
                        </td>
                        </tr>
                    </tbody>
                    </table>
                </div-->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Student-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><strong>Calificación del estudiante</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{ url('class') }}" method="post">
            @csrf
                This is a primary alert—check it out!
                <div class="row">
                
                <div class="alert " role="alert"></div>
                    <div class="col">
                        <div class="form-check form-check-radio form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="question1" id="inlineRadio1" value="1"> Bajo
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                        </label>
                        </div>
                        <div class="form-check form-check-radio form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="question1" id="inlineRadio2" value="2"> Medio
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                        </label>
                        </div>
                        <div class="form-check form-check-radio form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="question1" id="inlineRadio3" value="3"> Alto
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                        </label>
                        </div>
                    </div>
                </div>

                This is a primary alert—check it out!
                <div class="row">
                <div class="alert " role="alert"></div>
                    <div class="col">
                        <div class="form-check form-check-radio form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="question2" id="inlineRadio1" value="1"> Bajo
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                        </label>
                        </div>
                        <div class="form-check form-check-radio form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="question2" id="inlineRadio2" value="2"> Medio
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                        </label>
                        </div>
                        <div class="form-check form-check-radio form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="question2" id="inlineRadio3" value="3"> Alto
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                        </label>
                        </div>
                    </div>
                </div>

                This is a primary alert—check it out!
                <div class="row">
                <div class="alert " role="alert"></div>
                    <div class="col">
                        <div class="form-check form-check-radio form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="question3" id="inlineRadio1" value="1"> Bajo
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                        </label>
                        </div>
                        <div class="form-check form-check-radio form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="question3" id="inlineRadio2" value="2"> Medio
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                        </label>
                        </div>
                        <div class="form-check form-check-radio form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="question3" id="inlineRadio3" value="3"> Alto
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                        </label>
                        </div>
                    </div>
                </div>

                This is a primary alert—check it out!
                <div class="row">
                <div class="alert " role="alert"></div>
                    <div class="col">
                        <div class="form-check form-check-radio form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="question4" id="inlineRadio1" value="1"> Bajo
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                        </label>
                        </div>
                        <div class="form-check form-check-radio form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="question4" id="inlineRadio2" value="2"> Medio
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                        </label>
                        </div>
                        <div class="form-check form-check-radio form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="question4" id="inlineRadio3" value="3"> Alto
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                        </label>
                        </div>
                    </div>
                </div>

                This is a primary alert—check it out!
                <div class="row">
                <div class="alert " role="alert"></div>
                    <div class="col">
                        <div class="form-check form-check-radio form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="question5" id="inlineRadio1" value="1"> Bajo
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                        </label>
                        </div>
                        <div class="form-check form-check-radio form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="question5" id="inlineRadio2" value="2"> Medio
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                        </label>
                        </div>
                        <div class="form-check form-check-radio form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="question5" id="inlineRadio3" value="3"> Alto
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                        </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input id="noActualClass" name="noActualClass" type="hidden" value="{{ $noActualClass }}">
                <input id="noActualLevel" name="noActualLevel" type="hidden" value="{{ $noActualLevel }}">
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
            </div>
            </div>
        </div>
    </div>

    <!-- Modal Teacher-->
    <div class="modal fade" id="modalTeacher" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><strong>Calificación del estudiante</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{ url('class') }}" method="post">
            @csrf
                This is a primary alert—check it out!
                <div class="row">
                
                <div class="alert " role="alert"></div>
                    <div class="col">
                        <div class="form-check form-check-radio form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="question1" id="inlineRadio1" value="1"> Bajo
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                        </label>
                        </div>
                        <div class="form-check form-check-radio form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="question1" id="inlineRadio2" value="2"> Medio
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                        </label>
                        </div>
                        <div class="form-check form-check-radio form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="question1" id="inlineRadio3" value="3"> Alto
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                        </label>
                        </div>
                    </div>
                </div>

                This is a primary alert—check it out!
                <div class="row">
                <div class="alert " role="alert"></div>
                    <div class="col">
                        <div class="form-check form-check-radio form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="question2" id="inlineRadio1" value="1"> Bajo
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                        </label>
                        </div>
                        <div class="form-check form-check-radio form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="question2" id="inlineRadio2" value="2"> Medio
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                        </label>
                        </div>
                        <div class="form-check form-check-radio form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="question2" id="inlineRadio3" value="3"> Alto
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                        </label>
                        </div>
                    </div>
                </div>

                This is a primary alert—check it out!
                <div class="row">
                <div class="alert " role="alert"></div>
                    <div class="col">
                        <div class="form-check form-check-radio form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="question3" id="inlineRadio1" value="1"> Bajo
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                        </label>
                        </div>
                        <div class="form-check form-check-radio form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="question3" id="inlineRadio2" value="2"> Medio
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                        </label>
                        </div>
                        <div class="form-check form-check-radio form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="question3" id="inlineRadio3" value="3"> Alto
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                        </label>
                        </div>
                    </div>
                </div>

                This is a primary alert—check it out!
                <div class="row">
                <div class="alert " role="alert"></div>
                    <div class="col">
                        <div class="form-check form-check-radio form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="question4" id="inlineRadio1" value="1"> Bajo
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                        </label>
                        </div>
                        <div class="form-check form-check-radio form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="question4" id="inlineRadio2" value="2"> Medio
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                        </label>
                        </div>
                        <div class="form-check form-check-radio form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="question4" id="inlineRadio3" value="3"> Alto
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                        </label>
                        </div>
                    </div>
                </div>

                This is a primary alert—check it out!
                <div class="row">
                <div class="alert " role="alert"></div>
                    <div class="col">
                        <div class="form-check form-check-radio form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="question5" id="inlineRadio1" value="1"> Bajo
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                        </label>
                        </div>
                        <div class="form-check form-check-radio form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="question5" id="inlineRadio2" value="2"> Medio
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                        </label>
                        </div>
                        <div class="form-check form-check-radio form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="question5" id="inlineRadio3" value="3"> Alto
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                        </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input id="noActualClass" name="noActualClass" type="hidden" value="{{ $noActualClass }}">
                <input id="noActualLevel" name="noActualLevel" type="hidden" value="{{ $noActualLevel }}">
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
            </div>
            </div>
        </div>
    </div>
  
</div>
</div>
</div>
@endsection
