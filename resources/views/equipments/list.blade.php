@extends('adminlte::page')

@section('content_header')
<h1>LISTING</h1>
<ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
    <li class="active">Equipments Listing</a></li>
</ol>
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <legend>Equipments Listing</legend>
        <a href="{{ route('createUser') }}" class="btn btn-success">New equipment
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
                <th>Local</th>
            </tr>
            <!-- @if (count($equipments) == 0) -->
            <tr>
                <td colspan="99" class="text-center">No equipment found.</td>
            </tr>
            <!-- @endif
            @foreach ($equipments as $equipment) -->
            <tr>
                <td class="list-action">
                    <a href="" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></a>
                    <a href="" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
                    <a href="" class="btn btn-default btn-sm"><i class="fa fa-eye"></i></a>
                </td>
                <td>{{ $equipment->id }}</td>
                <td>{{ $equipment->name }}</td>
                <td>{{ $equipment->local }}</td>
            </tr>
            <!-- @endforeach -->
        </table>
    </div>
    <!-- {!! $equipments->links() !!} -->
</div>
@stop
