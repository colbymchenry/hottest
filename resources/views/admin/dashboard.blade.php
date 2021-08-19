@extends('layouts.app-fox')

@section('title', 'Admin Dashboard')

@section('admin_before')
<link href="{{ asset('css/admin.css') }}" type="text/css" rel="stylesheet" />
<link href="{{ asset('vendor/c3chart/c3.min.css') }}" type="text/css" rel="stylesheet" />
@stop

@section('admin_side')
    @include('admin/includes/side')
@stop


@section('content')

<div class="container-fluid">

        <!--top dashboard-->

            <div class="row">
                <div class="col-lg-7 col-12">
                    <h4 class="flame-admin-title">Dashboard</h4>
                </div>
                <div class="col-lg-5  col-12 text-lg-right">
                    @include('analytics/mini_web_stats')
                </div>
                @include('analytics/3_income')
            </div>

        <!--/top dashboard-->


            <div class="row">
                <div class="col-md-6 col-sm-6">
                    @include('analytics/sub_msg_snap')
                </div>

                <div class="col-xl-6 col-md-6">
                    @include('analytics/map')
                </div>

                <div class="col-md-6">
                    @include('analytics/activity')
                </div>


                <div class="col-xl-6 col-md-6">
                    @include('analytics/circle_chart')
                </div>               
                
            </div>

    <!--sales report & active user-->
    <div class="row">
        <div class="col-xl-8 col-md-7">
           @include('analytics/sales_report_chart')
        </div>
        <div class="col-xl-4 col-md-5">
           @include('analytics/site_activity')
        </div>
    </div>
    <!--/sales report & active user-->

    <!--sales monitor-->
    <div class="row">
        <div class="col-12">
            @include('analytics/world_map')
        </div>
    </div>
    <!--/sales monitor-->

    <!--member performance & support ticket-->
    <div class="row">
        <div class="col-xl-6">
            @include('analytics/models_performance')
        </div>
        <div class="col-xl-6">
            @include('analytics/model_applications')
        </div>
    </div>
       
</div>


@endsection

@section('admin_after')

    <!--sparkline-->
    <script src="{{ asset('vendor/sparkline/jquery.sparkline.js') }}"></script>
    @include('analytics/mini_web_stats-js')
    <!--chartjs-->
    <script src="{{ asset('vendor/chartjs/Chart.bundle.min.js') }}"></script>
    @include('analytics/3_income-js')
    @include('analytics/sub_msg_snap-js')
    @include('analytics/sales_report_chart-js')
    @include('analytics/circle_chart-js')
    <!-- map -->
    <script src="{{ asset('vendor/vector-map/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('vendor/vector-map/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('vendor/vector-map/jquery-jvectormap-us-aea.js') }}"></script>
    @include('analytics/map-js')
    @include('analytics/world_map-js')
    <!-- admin page js -->
    <script src="{{ asset('js/admin.js') }}"></script>

@stop