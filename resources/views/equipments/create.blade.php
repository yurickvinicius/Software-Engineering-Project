@extends('adminlte::page')

@section('content_header')
<h1>REGISTERS</h1>
<ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
    <li class="active">REGISTER EQUIPAMENTS</a></li>
</ol>
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <legend>Register Equipaments</legend>
        <a href="{{ route('listingEquipments') }}" class="btn btn-primary">
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
        <form action="{{ route('storeEquipment') }}" class="form-horizontal" method="post">
            {!! csrf_field() !!}

            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

            <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                <label class="control-label col-sm-3" for="name">Name: </label>
                <div class="col-sm-6">
                    <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" placeholder="name">
                    @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group has-feedback {{ $errors->has('local') ? 'has-error' : '' }}">
                <label class="control-label col-sm-3" for="local">Local: </label>
                <div class="col-sm-6">
                    <input type="text" id="local" name="local" class="form-control" placeholder="local">
                    @if ($errors->has('local'))
                    <span class="help-block">
                        <strong>{{ $errors->first('local') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <input type="hidden" value="">
            <div class="center-block">
                <button type="submit" class="btn btn-success col-md-offset-4">Create equipament</button>
                <button type="submit" class="btn btn-danger col-md-offset-1">Cancel</button>
            </div>
        </form>
    </div>
</div>
@stop
