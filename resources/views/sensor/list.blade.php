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
                        <button onclick="viewUserSensor({{ $sensor->id }})" data-toggle="modal" data-target="#userSensorModal" onclick="viewUserSensor('{{ $sensor->id }}')" type="button" class="btn btn-default btn-sm"><i class="fa fa-user"></i></button>
                    </td>
                    @endif
                    <!-- <td>{{ $sensor->id }}</td> -->
                    <td>{{ $sensor->name }}</td>
                    <td>{{ $sensor->equipament }}</td>
                </tr>
                @endforeach

                <!------------------- MODAL ------------------->

                @include('sensor.modal.modal_sensor')
                @include('sensor.modal.modal_user_sensor')

                <!------------------------------------->

            </table>
        </div>
        {!! $sensors->links() !!}
    </div>
</div>
@stop

@section('css')
<style>
td {
    text-align: center;
}

th {
    text-align: center;
}

.list-action{
text-align: center;
}
</style>
@stop
