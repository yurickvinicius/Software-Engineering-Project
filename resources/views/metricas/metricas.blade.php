@extends('adminlte::page')

@section('content_header')
<h1>MÉTRICAS</h1>
<ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
    <li class="active">Métricas</a></li>
</ol>
@stop

@section('content')
<div class="row">
    <div class="col-sm-6">
        <div class="box box-info">
            <div class="box-header">
                <i class="fa fa-clipboard"></i>
                <h3 class="box-title">Índice de Maturidade do Software - SMI</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <legend></legend>
                <div class="">
                    <p>Número de módulos da versão atual: {{ $indiceMaturidade[0] }}</p>
                </div>
                <div class="">
                    <p>Número de módulos da versão atual que foram alterados: {{ $indiceMaturidade[1] }}</p>
                </div>
                <div class="">
                    <p>Número de módulos da versão atual que foram acrescentados: {{ $indiceMaturidade[2] }}</p>
                </div>
                <div class="">
                    <p>Número de módulos da versão anterior que foram excluídos na versão atual: {{ $indiceMaturidade[3] }}</p>
                </div>
                <div class="maturidade">
                    <p><b>Índice de Maturidade do Software - SMI = {{ $indiceMaturidade[4]}}</b></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="box box-info">
            <div class="box-header">
                <i class="fa fa-clipboard"></i>
                <h3 class="box-title">Sobre o Código Fonte</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <legend></legend>
                <div class="">
                    <p>Número de operadores distintos que aparecem em um programa: {{ $codigoFonte[0] }}</p>
                </div>
                <div class="">
                    <p>Número de operandos distintos que aparecem em um programa: {{ $codigoFonte[1] }}</p>
                </div>
                <div class="">
                    <p>Número total de ocorrências de operador: {{ $codigoFonte[2] }}</p>
                </div>
                <div class="">
                    <p>Número total de ocorrências de operando: {{ $codigoFonte[3] }}</p>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <p><b>Volume do Programa: {{ $codigoFonte[5] }}</b></p>
                    </div>
                    <div class="col-sm-6">
                        <p><b>Volume Mínimo do Algoritmo: {{ $codigoFonte[6]}}</b></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="box box-info">
            <div class="box-header">
                <i class="fa fa-clipboard"></i>
                <h3 class="box-title">Número Total de Erros</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <legend></legend>
                <div class="">
                    <p>Erros Secundários: {{ $totalErros[0] }}</p>
                </div>
                <div class="">
                    <p>Erros Graves: {{ $totalErros[1] }}</p>
                </div>
                <div class="">
                    <p><b>Total de Erros: {{ $totalErros[2] }}</b></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="box box-info">
            <div class="box-header">
                <i class="fa fa-clipboard"></i>
                <h3 class="box-title">Densidade de erros</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <legend></legend>
                <div class="">
                    <p>Tamanho do artefato de software - Páginas do documento: {{ $densidadeErros[0]}}</p>
                </div>
                <div class="">
                    <p>Tamanho do artefato de software - Linhas de código: {{ $densidadeErros[1] }}</p>
                </div>
                <div class="">
                    <p><b>Densidade de Erros: {{ $densidadeErros[4] }}</b></p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="box box-info">
            <div class="box-header">
                <i class="fa fa-clipboard"></i>
                <h3 class="box-title">Esforço Total de Revisão</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <legend></legend>
                <div class="">
                    <p>Esforço de preparação: {{ $esforcoRevisao[0] }}</p>
                </div>
                <div class="">
                    <p>Esforço de avaliação: {{ $esforcoRevisao[1] }}</p>
                </div>
                <div class="">
                    <p>Reformulação esforço: {{ $esforcoRevisao[2] }}</p>
                </div>
                <div class="">
                    <p><b>Esforço Total de Revisão: {{ $esforcoRevisao[3] }}</b></p>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
