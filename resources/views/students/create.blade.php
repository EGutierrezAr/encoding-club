@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Nuevo usuario</h4>
                            <p class="card-category">Complete los datos del estudiante</p>
                            <a href="{{ url('students') }}" class="btn btn-secondary pull-right" >Cancelar y volver</a>
                        </div>
                        
                        <div class="card-body">
                            @if($errors->any())
                            <div class="alert alert-warning">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="material-icons">close</i>
                                </button>
                                <span>
                                    @foreach($errors->all() as $error)
                                    <li> <b> Advertencia - </b> {{ $error }} </span></li>
                                    @endforeach()
                            </div>
                            @endif()
                            <form action="{{ url('students') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                <!--div class="form-group">
                                    <label form="specialties">Estatus</label>
                                    <select name="status"  id="status" class="form-control "  >
                                        <option value="1">Prueba1</option>
                                        <option value="2">Activo</option>
                                        <option value="3">Inactivo</option>
                                    </select>
                                </div-->

                                 <div class="form-group">
                                    <label for="exampleFormControlSelect1">Estatus</label>
                                    <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1">
                                    <option value="1">Prueba</option>
                                    <option value="2">Activo</option>
                                    <option value="3">Inactivo</option>
                                    </select>
                                </div>
                                </div>
                                <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Nombre</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                                </div>
                                </div>
                                <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Apellido</label>
                                    <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control">
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Correo</label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control">
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Contraseña</label>
                                    <input type="password" name="password" value="{{ old('password') }}" class="form-control">
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Dirección</label>
                                    <input type="text" name="address" value="{{ old('address') }}" class="form-control">
                                </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Telefono</label>
                                    <input type="text" name="phone" value="{{ old('phone') }}" class="form-control">
                                </div>
                                </div>
                                <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Ciudad</label>
                                    <input type="text" name="city" value="{{ old('city') }}" class="form-control">
                                </div>
                                </div>
                                <div class="col-md-4">
                                <!--div class="form-group">
                                    <label form="specialties">Nivel</label>
                                    <select name="level"  id="level" class="form-control "  >
                                        <option value="1">Básico</option>
                                        <option value="2">Medio</option>
                                        <option value="3">Avanzado</option>
                                    </select>
                                </div-->
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Nivel</label>
                                    <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1">
                                    <option value="1">Básico</option>
                                    <option value="2">Medio</option>
                                    <option value="3">Avanzado</option>
                                    </select>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                <div class="form-group">
                                    <label>Observaciones</label>
                                    <div class="form-group">
                                    <label class="bmd-label-floating"> Observaciones relacionadas del alumno.</label>
                                    <textarea class="form-control" value="{{ old('observation') }}" name="observation" rows="5"></textarea>
                                    </div>
                                </div>
                                </div>
                            </div>

                            
                            <button type="submit" class="btn btn-primary pull-right">Guardar</button>
                            <div class="clearfix"></div>
                            </form>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-profile">
                            <div class="card-avatar">
                                <a href="javascript:;">
                                <img class="img" src="{{ asset('img/faces/marc.jpg') }}" />
                                </a>
                            </div>
                            <div class="card-body">
                                <h6 class="card-category text-gray">CEO / Co-Founder</h6>
                                <h4 class="card-title">Alec Thompson</h4>
                                <p class="card-description">
                                Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                                </p>
                                <a href="javascript:;" class="btn btn-primary btn-round">Follow</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
      