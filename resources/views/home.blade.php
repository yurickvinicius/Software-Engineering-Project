@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard</h1>
@stop

@section('content')


<div class="box">
    <div class="box-body">

        @if(auth()->user()->type == 1)
            @include('partial.home_admin')
        @else
            @include('partial.home_comum')
        @endif

    </div>
</div>


@stop
