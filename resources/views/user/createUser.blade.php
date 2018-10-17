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
        <form action="{{ route('storeUser') }}" class="form-horizontal" method="post">
            {!! csrf_field() !!}

            @include('user.partials.form')


        </form>
    </div>
</div>
@stop
