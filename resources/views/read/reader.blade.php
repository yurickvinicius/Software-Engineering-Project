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
                    <label class="control-label col-sm-3 selectpicker" for="selEquipament">Equipament: </label>
                    <div class="col-sm-7">
                        <select class="form-control" name="equipament" id="selEquipament">
                            <option value="0">Select a equipament</option>
                            @if(isset($request))
                            @foreach($equipaments as $equipament)
                            @if($request->equipament == $equipament->id)
                            <option value="{{ $equipament->id }}" selected>{{ $equipament->name }}</option>
                            @else
                            <option value="{{ $equipament->id }}">{{ $equipament->name }}</option>
                            @endif
                            @endforeach
                            @else
                            @foreach($equipaments as $equipament)
                            <option value="{{ $equipament->id }}">{{ $equipament->name }}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3 selectpicker" for="sensors">Sensor: </label>
                    <div class="col-sm-7">
                        <button data-toggle="modal" data-target="#listSensorsModal" type="button" class="btn btn-default btn-sm"><i class="fa fa-list"></i> Click for list the sensors</button>
                        <span id="sQtdSensorsSel"></span>
                    </div>
                </div>

                @include('read.modal.list_sensors')

                <div class="form-group">
                    <div>
                        <label class="control-label col-sm-3" for="dataInit">Data Início:</label>
                        <div class="col-sm-3">
                            @if(isset($request))
                            <input type="date" id="dataInit" name="dataInit" class="form-control campo-metade" placeholder="Mínimo" value="{{ $request->dataInit}}">
                            @else
                            <input type="date" id="dataInit" name="dataInit" class="form-control campo-metade" placeholder="Mínimo">
                            @endif
                        </div>
                    </div>
                    <div>
                        <label class="control-label col-sm-1" for="dataFin">Data Fim:</label>
                        <div class="col-sm-3">
                            @if(isset($request))
                            <input type="date" id="dataFin" name="dataFin" class="form-control campo-metade" placeholder="Máximo" value="{{ $request->dataFin}}">
                            @else
                            <input type="date" id="dataFin" name="dataFin" class="form-control campo-metade" placeholder="Máximo">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <div class="btn-group div-button">
                        <button type="submit" class="btn btn-success">Filtrar</button>
                    </div>
                    <div class="btn-group div-button">
                        <a href="{{ route('readingPDF') }}" class="btn btn-primary">Gerar PDF</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-12 div-table">
            <table class="table table-condensed table-bordered table-striped">
                <thead>
                    <tr class="active">
                        <!-- <th>Equipament</th> -->
                        <th>*</th>
                        <th>Sensor</th>
                        <th>Value</th>
                        <th>Date reader</th>
                    </tr>
                </thead>

                @if(isset($reads))
                @if(count($reads) == 0)
                <tr>
                    <td colspan="99" class="text-center">No read found.</td>
                </tr>
                @endif

                        <?php $cont=1 ?>
                        @foreach ($reads as $read)
                            <tr>
                                <td>{{ $cont++ }}</td>
                                <td>{{ $read->sensor }}</td>
                                <td>{{ $read->value }}</td>
                                <td>{{ $read->created_at }}</td>
                            </tr>
                        @endforeach
                @else
                <tr>
                    <td colspan="99" class="text-center">No read found.</td>
                </tr>
                @endif
            </table>

            <div id="chart-lines"></div><!-- Div que renderiza o grafico de linhas -->

        </div>

    </div>
</div>
@stop


<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
        google.load("visualization", "1", {packages:["corechart"]});
        google.setOnLoadCallback(drawChart);
        function drawChart() {

        //montando o array com os dados
        var data = google.visualization.arrayToDataTable([

            <?= $chart ?>
        ]);

        //opções para o gráfico linhas
        var options1 = {
          title: 'Analise de leituras por período',
          hAxis: {title: 'Dias da Semana',  titleTextStyle: {color: 'Blue'}}//legenda na horizontal
        };

        //instanciando e desenhando o gráfico linhas
        var linhas = new google.visualization.LineChart(document.getElementById('chart-lines'));
        linhas.draw(data, options1);
         
    }
</script>




@section('css')
<style>
.div-button {
padding-right: 20px;
}

.div-table {
margin-top: 30px;
}

#chart-lines{
    width: 900px; 
    height: 500px;
    margin: 50px auto;
 }


td {
    text-align: center;
}

th {
    text-align: center;
}
</style>
@stop


