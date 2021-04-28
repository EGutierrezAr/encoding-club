@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-8">
                <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Nuevo Profesor</h4>
                    <p class="card-category">Complete los datos del profesor</p>
                    <a href="{{ url('teachers') }}" class="btn btn-secondary pull-right" >Cancelar y volver</a>
                </div>
                <div class="card-body">
                    <form action="{{ url('teachers') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Estatus</label>
                                <select class="form-control selectpicker" data-style="btn btn-link" id="status"  name="status">
                                <option value="1">Prueba</option>
                                <option value="2">Activo</option>
                                <option value="3">Inactivo</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <label class="bmd-label-floating">Nombre</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <label class="bmd-label-floating">Apellido</label>
                            <input type="text" name="last_name" class="form-control">
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Correo</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Contraseña</label>
                            <input type="text" name="password" class="form-control">
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Dirección</label>
                            <input type="text" name="address" class="form-control">
                        </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="bmd-label-floating">Telefono</label>
                            <input type="text" name="phone" class="form-control">
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <label class="bmd-label-floating">Ciudad</label>
                            <input type="text" name="city" class="form-control">
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Nivel</label>
                            <select class="form-control selectpicker" data-style="btn btn-link" id="level" name="level">
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
                            <label class="bmd-label-floating"> Observaciones relacionadas con el profesor.</label>
                            <textarea class="form-control" name="observation" rows="5"></textarea>
                            </div>
                        </div>
                        </div>
                    </div>
                    <input type="text" hidden="true" name="role" value="teacher" class="form-control">
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
@endsection
      