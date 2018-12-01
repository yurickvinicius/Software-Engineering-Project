@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard</h1>
@stop

@section('content')


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
                <div class="small-box bg-blue">
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
                <div id="divDataReads" class="small-box bg-red">
                    <div class="inner">
                        <h3 id="dataReads">{{ $reads}}</h3>

                        <p id="onOffReads">Read Ofline</p>
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

        <div class="row">

                <div class="col-md-12">
                        <div class="box">
                          <div class="box-header with-border">
                            <h3 class="box-title">Sensor Week Report</h3>                                          
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body">
                            <div class="row">
                              <div class="col-md-12">                     
              
                                <div>
                                    <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                                </div>

                                <!-- /.chart-responsive -->
                              </div>
           
                            </div>
                            <!-- /.row -->
                          </div>
                          <!-- ./box-body -->
                          <div class="box-footer">
                            <div class="row">
                              <div class="col-sm-3 col-xs-6">
                                <div class="description-block border-right">
                                  <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>
                                  <h5 class="description-header">1050</h5>
                                  <span class="description-text">Média Semanal</span>
                                </div>
                                <!-- /.description-block -->
                              </div>
                              <!-- /.col -->
                              <div class="col-sm-3 col-xs-6">
                                <div class="description-block border-right">
                                  <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>
                                  <h5 class="description-header">Sensor s02</h5>
                                  <span class="description-text">Mediana</span>
                                </div>
                                <!-- /.description-block -->
                              </div>
                              <!-- /.col -->
                              <div class="col-sm-3 col-xs-6">
                                <div class="description-block border-right">
                                  <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>
                                  <h5 class="description-header">35</h5>
                                  <span class="description-text">Desvio Padão</span>
                                </div>
                                <!-- /.description-block -->
                              </div>
                              <!-- /.col -->
                              <div class="col-sm-3 col-xs-6">
                                <div class="description-block">
                                  <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>
                                  <h5 class="description-header">1050</h5>
                                  <span class="description-text">Moda Semanal</span>
                                </div>
                                <!-- /.description-block -->
                              </div>
                            </div>
                            <!-- /.row -->
                          </div>
                          <!-- /.box-footer -->
                        </div>
                        <!-- /.box -->
                      </div>

        </div>


    </div>
</div>


@stop
