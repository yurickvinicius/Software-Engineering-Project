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
        <form action="{{ route('profileUpdate') }}" class="form-horizontal" method="post">
            {!! csrf_field() !!}
            <div class="form-group">
                <label class="control-label col-sm-3" for="name">Name: </label>
                <div class="col-sm-6">
                    <input type="text" id="name" name="name" class="form-control" placeholder="name">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="local">Local: </label>
                <div class="col-sm-6">
                    <input type="text" id="local" name="local" class="form-control" placeholder="local">
                </div>
            </div>
            <input type="hidden" value="">
            <div class="center-block">
                <button type="submit" class="btn btn-success col-md-offset-4">Create user</button>
                <button type="submit" class="btn btn-danger col-md-offset-1">Cancel</button>
            </div>
        </form>
    </div>
</div>
@stop
