@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard</h1>
@stop

@section('content')
<div class="box box-success">
    <div class="box-header with-border">
        <i class="fa fa-comments-o"></i>
        <h3 class="box-title">About the system</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
        </div>
    </div>

    <div class="box-body">
        <p>The system have with function the register of sensors of any natureza for captation of
            datas, the control and manager of information geted and transfered for a hardware for a
            address especifc web using request HTTP\GET
        </p>
    </div>
</div>
<div class="box">
    <div class="box-body">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{ $equipments }}</h3>

                        <p>Equipaments Registrations</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-phone-portrait"></i>
                    </div>
                    <a href="/home/listingEquipments" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{ $sensors }}</h3>

                        <p>Sensors Registrations</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-pulse-strong"></i>
                    </div>
                    <a href="/home/listingSensors" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{ $reads}}</h3>

                        <p>Sensors Online</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="/home/read/list/sensors" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3> {{ $users }}</h3>

                        <p>User Registrations</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="/home/listingUsers" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
window.onload = function () {

    var options = {
        animationEnabled: true,
        theme: "light2",
        title:{
            text: "Actual vs Projected Sales"
        },
        axisX:{
            valueFormatString: "DD MMM"
        },
        axisY: {
            title: "Number of Sales",
            suffix: "K",
            minimum: 30
        },
        toolTip:{
            shared:true
        },
        legend:{
            cursor:"pointer",
            verticalAlign: "bottom",
            horizontalAlign: "left",
            dockInsidePlotArea: true,
            itemclick: toogleDataSeries
        },
        data: [{
            type: "line",
            showInLegend: true,
            name: "Projected Sales",
            markerType: "square",
            xValueFormatString: "DD MMM, YYYY",
            color: "#F08080",
            yValueFormatString: "#,##0K",
            dataPoints: [
                { x: new Date(2017, 10, 1), y: 63 },
                { x: new Date(2017, 10, 2), y: 69 },
                { x: new Date(2017, 10, 3), y: 65 },
                { x: new Date(2017, 10, 4), y: 70 },
                { x: new Date(2017, 10, 5), y: 71 },
                { x: new Date(2017, 10, 6), y: 65 },
                { x: new Date(2017, 10, 7), y: 73 },
                { x: new Date(2017, 10, 8), y: 96 },
                { x: new Date(2017, 10, 9), y: 84 },
                { x: new Date(2017, 10, 10), y: 85 },
                { x: new Date(2017, 10, 11), y: 86 },
                { x: new Date(2017, 10, 12), y: 94 },
                { x: new Date(2017, 10, 13), y: 97 },
                { x: new Date(2017, 10, 14), y: 86 },
                { x: new Date(2017, 10, 15), y: 89 }
            ]
        },
        {
            type: "line",
            showInLegend: true,
            name: "Actual Sales",
            lineDashType: "dash",
            yValueFormatString: "#,##0K",
            dataPoints: [
                { x: new Date(2017, 10, 1), y: 60 },
                { x: new Date(2017, 10, 2), y: 57 },
                { x: new Date(2017, 10, 3), y: 51 },
                { x: new Date(2017, 10, 4), y: 56 },
                { x: new Date(2017, 10, 5), y: 54 },
                { x: new Date(2017, 10, 6), y: 55 },
                { x: new Date(2017, 10, 7), y: 54 },
                { x: new Date(2017, 10, 8), y: 69 },
                { x: new Date(2017, 10, 9), y: 65 },
                { x: new Date(2017, 10, 10), y: 66 },
                { x: new Date(2017, 10, 11), y: 63 },
                { x: new Date(2017, 10, 12), y: 67 },
                { x: new Date(2017, 10, 13), y: 66 },
                { x: new Date(2017, 10, 14), y: 56 },
                { x: new Date(2017, 10, 15), y: 64 }
            ]
        }]
    };
    $("#chartContainer1").CanvasJSChart(options);

    function toogleDataSeries(e){
        if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
        } else{
            e.dataSeries.visible = true;
        }
        e.chart.render();
    }

}
</script>

<div id="chartContainer1" style="height: 300px; width: 100%;"></div>
</div>



@stop
