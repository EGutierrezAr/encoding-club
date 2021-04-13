@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-8">
                <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Editar estudiantes</h4>
                    <p class="card-category">Complete los datos del estudiante</p>
                </div>
                <div class="card-body">
                    <form action="{{ url('students/'.$student->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-4">
                        <div class="form-group">
                            <label class="bmd-label-floating">Estatus</label>
                            <input type="text" name="status" value="{{ old('status', $student->status) }}"  class="form-control">
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <label class="bmd-label-floating">Nombre</label>
                            <input type="text" name="name" value="{{ old('name', $student->name) }}" class="form-control">
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <label class="bmd-label-floating">Apellido</label>
                            <input type="text" name="last_name" value="{{ old('last_name', $student->last_name) }}" class="form-control">
                        </div>
                        </div>
                    </div>
                    <!--div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Correo</label>
                            <input type="email" name="email" value="{{ old('email', $student->email) }}" class="form-control">
                        </div>
                        </div>
                    </div-->
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Dirección</label>
                            <input type="text" name="address" value="{{ old('address', $student->address) }}" class="form-control">
                        </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="bmd-label-floating">Telefono</label>
                            <input type="text" name="phone" value="{{ old('phone', $student->phone) }}" class="form-control">
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <label class="bmd-label-floating">Ciudad</label>
                            <input type="text" name="city" value="{{ old('city', $student->city) }}" class="form-control">
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <label class="bmd-label-floating">Nivel</label>
                            <input type="text" name="level" value="{{ old('level', $student->level) }}" class="form-control">
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <label>Observaciones</label>
                            <div class="form-group">
                            <label class="bmd-label-floating"> Observaciones relacionadas del alumno.</label>
                            <textarea class="form-control" name="observation" value="{{ old('observation', $student->observation) }}"  rows="5"></textarea>
                            <input type="text" name="observation" value="{{ old('observation', $student->observation) }}" class="form-control">
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
@endsection
      