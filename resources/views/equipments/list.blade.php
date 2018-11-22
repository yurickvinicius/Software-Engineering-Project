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
        <a href="{{ route('createEquipments') }}" class="btn btn-primary">
            <i class="fa fa-plus"> Create Equipment</i>
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
                    @if(auth()->user()->type == 1)
                    <th>Action</th>
                    @endif
                    <!-- <th>#</th> -->
                    <th>Name</th>
                    <th>Local</th>
                </tr>
                @if (count($equipments) == 0)
                <tr>
                    <td colspan="99" class="text-center">No equipment found.</td>
                </tr>
                @endif
                @foreach ($equipments as $equipment)
                <tr>
                    @if(auth()->user()->type == 1)
                    <td class="list-action">
                        <a href="{{ route('destroyEquipment', $equipment->id) }}" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></a>
                        <a href="{{ route('editEquipment', $equipment->id) }}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
                        <button data-toggle="modal" data-target="#equipModal" onclick="viewEquip('{{ $equipment->id }}')" type="button" class="btn btn-default btn-sm"><i class="fa fa-eye"></i></button>
                    </td>
                    @endif
                    <!-- <td>{{ $equipment->id }}</td> -->
                    <td>{{ $equipment->name }}</td>
                    <td>{{ $equipment->local }}</td>
                </tr>
                @endforeach

                <!------------------- MODAL ------------------->

                <div class="modal fade" id="equipModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Equipament Data</h4>
                            </div>
                            <div class="modal-body">

                                <div class="form-group">
                                    <label>Nome: </label>
                                    <span id="equipName"></span>
                                </div>
                                <div class="form-group">
                                    <label>Local: </label>
                                    <span id="equipLocal"></span>
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
        {!! $equipments->links() !!}
    </div>
</div>
@stop

@section('css')
<style>
/* td {
    width: 35px;
    text-align: center;
} */

th {
    /* width: 35px; */
    text-align: center;
}

.list-action{
text-align: center;
}
</style>
@stop
