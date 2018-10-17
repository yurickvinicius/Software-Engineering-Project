@extends('adminlte::page')

@section('content_header')
<h1>LISTING</h1>
<ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
    <li class="active">User Listing</a></li>
</ol>
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <legend>User Listing</legend>
        @if(auth()->user()->type == 1)
        <a href="{{ route('createUser') }}" class="btn btn-primary">New user
            <i class="fa fa-user-plus"></i>
        </a>
        @endif
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
                @if(auth()->user()->type == 1)
                <th>Action</th>
                @endif
                <th style="width: 10px">#</th>
                <th>Name</th>
                <th>Login</th>
                <th>Email</th>
                <th>Type</th>
            </tr>
            @foreach ($users as $user)
            <tr>
                @if(auth()->user()->type == 1)
                <td class="list-action">
                    <a href="{{ route('userDestroy', $user->id) }}" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></a>
                    <a href="{{ route('editUser', $user->id) }}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('showUser', $user->id) }}" class="btn btn-default btn-sm"><i class="fa fa-eye"></i></a>
                    <!-- <a href="{{ route('userDestroy', ['id'=>$user->id]) }}" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></a>
                    <a href="" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
                    <a href="" class="btn btn-default btn-sm"><i class="fa fa-eye"></i></a> -->
                </td>
                @endif
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->login }}</td>
                <td>{{ $user->email }}</td>
                @if ($user->type == 1)
                <td>Administrador</td>
                @else
                <td>Comum</td>
                @endif
            </tr>
            @endforeach
        </table>
    </div>
    {!! $users->links() !!}
</div>
@stop
