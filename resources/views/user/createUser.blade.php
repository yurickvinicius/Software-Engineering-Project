@extends('adminlte::page')

@section('content_header')
<h1>REGISTERS</h1>
<ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
    <li class="active">Register User</a></li>
</ol>
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <legend>Register User</legend>
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
                <label class="control-label col-sm-3" for="login">Login: </label>
                <div class="col-sm-6">
                    <input type="text" id="login" name="login" class="form-control" placeholder="exemplo123">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="email">Email: </label>
                <div class="col-sm-6">
                    <input type="text" id="email" name="email" class="form-control" placeholder="exemplo@teste.com">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="password">Password: </label>
                <div class="col-sm-6">
                    <input type="text" id="password" name="password" class="form-control" placeholder="******">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="confirmPassword">Confirm Password:</label>
                <div class="col-sm-6">
                    <input type="text" id="confirmPassword" name="confirmPassword" class="form-control" placeholder="******">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="type">Type:</label>
                <div class="col-sm-6">
                    <select class="form-control" name="type" id="type">
                        <option value="0">Select type</option>
                        <option value="1">Administrador</option>
                        <option value="2">Comum</option>
                    </select>
                </div>
            </div>
            <div class="center-block">
                <button type="submit" class="btn btn-success col-md-offset-4">Create user</button>
                <button type="submit" class="btn btn-danger col-md-offset-1">Cancel</button>
            </div>
        </form>
    </div>
</div>
@stop
