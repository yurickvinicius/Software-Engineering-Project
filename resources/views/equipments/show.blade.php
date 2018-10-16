@extends('adminlte::page')

@section('content_header')
<h1>REGISTERS</h1>
<ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
    <li class="active">SHOW EQUIPAMENT</a></li>
</ol>
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <legend>Show Equipaments</legend>
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
        <form action="" class="form-horizontal">
            {!! csrf_field() !!}

            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

            <div class="form-group">
                <label class="control-label col-sm-3" for="name">Name: </label>
                <div class="col-sm-6">
                    <input type="text" id="name" name="name" class="form-control" value="{{ $equipment->name }}" disabled>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="local">Local: </label>
                <div class="col-sm-6">
                    <input type="text" id="local" name="local" class="form-control" value="{{ $equipment->local }}" disabled>
                </div>
            </div>
        </form>
    </div>
</div>
@stop
