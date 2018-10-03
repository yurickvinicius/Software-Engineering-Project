@extends('adminlte::page')

@section ('title', 'Setting')

@section('content_header')
<h1>ACCOUNT SETTINGS</h1>
<ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
    <li class="active">Change Password</a></li>
</ol>
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <legend>Change Password</legend>
    </div>
    <div class="box-body">
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
        <form action="{{ route('settings') }}" class="form-horizontal" method="post">
            {!! csrf_field() !!}
            <div class="form-group">
                <label class="control-label col-sm-3" for="name">Name: </label>
                <div class="col-sm-6">
                    <input type="text" id="name" name="name" class="form-control" value="{{ auth()->user()->name}}" disabled>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="email">Email: </label>
                <div class="col-sm-6">
                    <input type="text" id="email" name="email" class="form-control" value="{{ auth()->user()->email}}" disabled>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="password">Password: </label>
                <div class="col-sm-6">
                    <input type="text" id="password" name="password" class="form-control" placeholder="******">
                </div>
            </div>
            <div class="center-block">
                <button type="submit" class="btn btn-success col-md-offset-4">Change Password</button>
                <button type="submit" class="btn btn-danger col-md-offset-1">Cancel</button>
            </div>
        </form>
    </div>
</div>
@stop
