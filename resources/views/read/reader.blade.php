@extends('adminlte::page')

@section ('title', 'Relatório')

@section('content_header')
<h1>
    REPORT READER
</h1>
<ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
    <li class="active">Report reader</a></li>
</ol>
@stop

@section('content')
<div class="box">
    <div class="box-body">
        <legend>Report Reader</legend>
        <div>
            <form action="{{ route('readingReport') }}" method="post" class="form-horizontal">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label class="control-label col-sm-3 selectpicker" for="equipament">Equipament: </label>
                    <div class="col-sm-7">
                        <select class="form-control" name="equipaments[]" id="equipment" multiple data-live-search="true">
                            @foreach($equipaments as $equipament)
                            <option value="{{ $equipament->id }}">{{ $equipament->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="sensor">Sensor: </label>
                    <div class="col-sm-7">
                        <select class="form-control" name="sensor_id" id="sensor" multiple>
                            @foreach($sensors as $sensor)
                            <option value="{{ $sensor->id }}">{{ $sensor->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <label class="control-label col-sm-3" for="data">Data Início:</label>
                        <div class="col-sm-2">
                            <input type="date" id="dataMinimo" name="dataMinimo" class="form-control campo-metade" placeholder="Mínimo">
                        </div>
                    </div>
                    <div>
                        <label class="control-label col-sm-3" for="data">Data Fim:</label>
                        <div class="col-sm-2">
                            <input type="date" id="dataMaximo" name="dataMaximo" class="form-control campo-metade" placeholder="Máximo">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <div class="btn-group div-button">
                        <button type="submit" class="btn btn-success">Filtrar</button>
                    </div>
                    <div class="btn-group div-button">
                        <a link="#" class="btn btn-primary">Gerar PDF</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-12 div-table">
            <table class="table table-condensed table-bordered table-striped">
                <thead>
                    <tr class="active">
                        <th>Equipament</th>
                        <th>Sensor</th>
                        <th>Value</th>
                        <th>Date reader</th>
                    </tr>
                </thead>

                @if(count($reads) == 0)
                <tr>
                    <td colspan="99" class="text-center">No read found.</td>
                </tr>
                @endif

                @foreach($reads as $read)
                    <tr>
                        <td>{{ $read->name}}</td>
                        <td>{{ $read->sensor_id }}</td>
                        <td>{{ $read->value }}</td>
                        <td>{{ date('d/m/Y', strtotime($sensor->created_at)) }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
</div>
@stop


@section('css')
<style>
.div-button {
    padding-right: 20px;
}

.div-table {
    margin-top: 30px;
}
</style>
@stop
