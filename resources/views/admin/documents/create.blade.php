@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Cargar Archivo</h4>
                    <p class="card-category">Llenar todos los campos</p>
                </div>
                <div class="card-body">
                    <form action="/files" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="bmd-label-floating">Título</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="bmd-label-floating">Descripción</label>
                                <input type="text" name="description" class="form-control">
                            </div>
                        </div>       
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label form="specialties">Módulo</label>
                                <select name="module"  id="module" class="form-control "  >
                                    <option value="1">Básico</option>
                                    <option value="2">Medio</option>
                                    <option value="3">Avanzado</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                            <label form="specialties">Clase</label>
                                <select name="class"  id="class" class="form-control "  >
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                        <label for="formFile" class="form-label">Documento</label>
                        <input class="form-control" type="file" name="file" id="file">
                        </div>
                        
                    </div>
   
                    <button type="submit" class="btn btn-primary pull-right">Guardar Documento</button>
                    <div class="clearfix"></div>
                    </form>
                </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">Lista de archivos</h4>
                  <p class="card-category">Archivos guardador en la Base de Datos</p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>view</th>
                        <th>Download</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($file as $key=>$data)
                      <tr>
                        <td>{{++$data->title}}</td>
                        <td>{{++$data->description}}</td>
                        <td><a href="/files/{{$data->id}}">View</a></td>
                        <td><a href="/files/download/{{$data->file}}">Download</a></td>
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
@endsection

<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="/files" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <input type="text" name="module" placeholder="Módulo">
    <input type="text" name="class" placeholder="Clase">
    <input type="text" name="title" placeholder="Título">
    <input type="text" name="description" placeholder="Descripción">
    <input type="file" name="file" >
    <input type="submit" value="Submit">
</form>
    
</body>
</html>
-->