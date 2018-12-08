@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard</h1>
@stop

@section('content')
@if(auth()->user()->type == 1)
    @include('partial.home_admin')
@else
    @include('partial.home_comum')
@endif
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js" integrity="sha384-THVO/sM0mFD9h7dfSndI6TS0PgAGavwKvB5hAxRRvc0o9cPLohB0wb/PTA7LdUHs" crossorigin="anonymous"></script>


<script type= text/javascript>
    var doc = new jsPDF();

    $('#print').click(function () {
        doc.fromHTML($('#box').html(), 15, 15, {
        'width': 170,

        });
        doc.save('sample-file.pdf');
    });

</script>
@stop
