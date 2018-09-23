@extends('adminlte::page')

@section ('title', 'Perfil')

@section('content_header')
<h1>
    PERFIL
</h1>
<ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i>Painel de Controle</a></li>
    <li class="active">Mudar Senha</a></li>
</ol>
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <legend>Mudar Senha</legend>
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
                <label class="control-label col-sm-3" for="nome">Nome: </label>
                <div class="col-sm-6">
                    <input type="text" id="nome" name="nome" class="form-control" value="{{ auth()->user()->name}}" disabled>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="email">Email: </label>
                <div class="col-sm-6">
                    <input type="text" id="email" name="email" class="form-control" value="{{ auth()->user()->email}}" disabled>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="password">Senha: </label>
                <div class="col-sm-6">
                    <input type="text" id="password" name="password" class="form-control" placeholder="******">
                </div>
            </div>
            <div class="center-block">
                <button type="submit" class="btn btn-success">Alterar Senha</button>
                <button type="submit" class="btn btn-danger">Cancelar</button>
            </div>
        </form>
    </div>
</div>
@stop

@section('css')
<style>
.img-profile img{
    position: absolute;
    left: 40%;
    top: 20%;
    height: 120px;
}
</style>
@stop
