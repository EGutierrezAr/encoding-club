@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
    <p>
    <!--iframe id="fraDisabled"  src="{{url('/storage/'.$data->file)}}" style="width:100%;min-height:640px;" ></iframe-->
    <iframe src="{{url('/storage/'.$data->file)}}" id="fraDisabled" style="width:100%;min-height:640px;"  onLoad="disableContextMenu();></iframe>
    </p>
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
    <title>Details</title>
</head>
<body>
<h2>{{$data->title}}</h2>
<h3>{{$data->description}}</h3>
<p>
    <iframe src="{{url('/storage/'.$data->file)}}" style="width: 600px; height: 500px;" frameborder="0"></iframe>
</p>
</body>
</html>
-->