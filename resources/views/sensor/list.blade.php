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
        <a href="{{ route('createSensor') }}" class="btn btn-primary">New sensor
            <i class="fa fa-user-plus"></i>
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

        <table class="table table-bordered col-sm-10">
            <tr>
                <th>Action</th>
                <th style="width: 10px">#</th>
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
                    <td class="list-action">
                        <a href="{{ route('destroySensor', ['id'=>$sensor->id]) }}" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></a>
                        <a href="" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
                        <a href="" class="btn btn-default btn-sm"><i class="fa fa-eye"></i></a>
                    </td>
                    <td>{{ $sensor->id }}</td>
                    <td>{{ $sensor->name }}</td>
                    <td>{{ $sensor->equipament->name }}</td>
                </tr>
            @endforeach
        </table>
</div>
@stop
