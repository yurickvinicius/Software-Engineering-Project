@extends('adminlte::page')

@section('content_header')
<h1>SENSOR</h1>
<ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
    <li class="active">EDIT SENSOR</a></li>
</ol>
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <legend>Edit Sensor</legend>
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
        <form action="{{ route('updateSensor') }}" class="form-horizontal" method="post">
            {!! csrf_field() !!}

            <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                <label class="control-label col-sm-3" for="name">Name: </label>
                <div class="col-sm-6">
                    <input type="text" id="name" name="name" class="form-control" value="{{ $sensor->name}}">
                    @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3" for="equipament">Equipament: </label>
                <div class="col-sm-6">
                    <select class="form-control" name="equipament_id" id="equipment">
                        @foreach($equipaments as $equipament)
                        @if($equipament->id == $sensor->equipament_id) {
                            <option value="{{ $equipament->id }}" selected>{{ $equipament->name }}</option>
                        }
                        @else
                        <option value="{{ $equipament->id }}">{{ $equipament->name }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <input type="hidden" name="id" value="{{ $sensor->id}}">
            <div class="center-block">
                <button type="submit" class="btn btn-success col-md-offset-4">Change sensor</button>
                <button type="submit" class="btn btn-danger col-md-offset-1">Cancel</button>
            </div>
        </form>
    </div>
</div>
@stop
