@extends('adminlte::page')

@section('content_header')
<h1>LISTING</h1>
<ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
    <li class="active">Sensor Listing</a></li>
</ol>
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <legend>Sensor Listing</legend>
        <a href="{{ route('createSensor') }}" class="btn btn-primary">
            <i class="fa fa-plus"> Create Sensor</i>
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

        <div class="col-sm-12 div-table">
            <table class="table table-bordered col-sm-10">
                <tr>
                    <th>Action</th>
                    <!-- <th>#</th> -->
                    <th>Name</th>
                    <th>Equipament</th>
                </tr>

                @if(count($sensors) == 0)
                <tr>
                    <td colspan="99" class="text-center">No sensor found.</td>
                </tr>
                @endif

                @foreach($sensors as $sensor)
                <tr>
                    @if(auth()->user()->type == 1)
                    <td class="list-action">
                        <a href="{{ route('destroySensor', ['id'=>$sensor->id]) }}" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></a>
                        <a href="{{ route('editSensor', $sensor->id)}}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
                        <button data-toggle="modal" data-target="#sensorModal" onclick="viewSensor('{{ $sensor->id }}')" type="button" class="btn btn-default btn-sm"><i class="fa fa-eye"></i></button>
                    </td>
                    @endif
                    <!-- <td>{{ $sensor->id }}</td> -->
                    <td>{{ $sensor->name }}</td>
                    <td>{{ $sensor->equipament }}</td>
                </tr>
                @endforeach

                <!------------------- MODAL ------------------->

                <div class="modal fade" id="sensorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Sensor Data</h4>
                            </div>
                            <div class="modal-body">

                                <div class="form-group">
                                    <label>Nome: </label>
                                    <span id="sensorName"></span>
                                </div>
                                <div class="form-group">
                                    <label>Created: </label>
                                    <span id="sensorCreated"></span>
                                </div>
                                <div class="form-group">
                                    <label>Equipament: </label>
                                    <span id="EquipamentName"></span>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!------------------------------------->

            </table>
        </div>
        {!! $sensors->links() !!}
    </div>
    @stop

    @section('css')
    <style>
    td {
        width: 35px;
        text-align: center;
    }

    th {
        width: 35px;
        text-align: center;
    }
</style>
@stop
