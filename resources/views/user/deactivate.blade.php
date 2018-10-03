@extends('adminlte::page')

@section ('title', 'Deactivate Account')

@section('content_header')
<h1>ACCOUNT SETTINGS</h1>
<ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
    <li class="active">Deactivate account</a></li>
</ol>
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <legend>Deactivate account</legend>
    </div>
    <div class="box-body">
        @if(session('error'))
        <p class="alert alert-error">
            {{ session('error') }}
        </p>
        @endif

        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center">
                <p>Are you sure you want to deactivate your account?</p>
                <p>Once deactivated, you will not be able to undo the operation.</p>
                <a href="deactivateUser" class="btn btn-danger">Yes</a>
                <a href="/home" class="btn btn-success col-md-offset-1">No</a>
            </div>
        </div>
    </div>
</div>
@stop
