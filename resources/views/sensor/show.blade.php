@extends('adminlte::page')

@section('content_header')
<h1>SENSOR</h1>
<ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
    <li class="active">SHOW SENSOR</a></li>
</ol>
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <legend>Show Sensor</legend>
        <a href="{{ route('listingSensors') }}" class="btn btn-primary">
            <i class="fa fa-arrow-left"></i>
            Return
        </a>
    </div>
    <div class="box-body">
        @if(session('sucess'))
        <p class="alert alert-success">
            {{ session('sucess') }}
        </p>
        @endif
        @if(session('error'))
        <p class="alert alert-error">
            {{ session('error') }}
        </p>
        @endif
        <form class="form-horizontal">
            {!! csrf_field() !!}

            <div class="form-group">
                <label class="control-label col-sm-3" for="name">Name: </label>
                <div class="col-sm-6">
                    <input type="text" id="name" name="name" class="form-control" value="{{ $sensor->name}}" disabled>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="equipament">Equipament: </label>
                <div class="col-sm-6">
                    <select class="form-control" name="equipament_id" id="equipment" disabled>
                        <option>{{ $equipment->name }}</option>
                    </select>
                </div>
            </div>
        </form>
    </div>
</div>
@stop
