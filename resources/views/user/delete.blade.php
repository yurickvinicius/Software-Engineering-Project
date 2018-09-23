@extends('adminlte::page')

@section ('title', 'Perfil')

@section('content_header')
<h1>
    PERFIL
</h1>
<ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-dashboard"></i>Painel de Controle</a></li>
    <li class="active">Perfil</a></li>
</ol>
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <legend>Desativar conta</legend>
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

        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center">
                <p>Você tem certeza que deseja desativar sua conta?</p>
                <p>Depois de desativada não irá poder desfazer a operação.</p>
                <!-- <div class="col-md-6 col-md-offset-3"> -->
                    <a href="deleteUser" class="btn btn-danger">Sim</a>
                    <a href="/home" class="btn btn-success">Não</a>
                <!-- </div> -->
            </div>
        </div>
                <!-- </form> -->
    </div>
</div>
@stop

@section('css')
<style>
.form-group {
    align-content: center;
}
</style>
@stop
