@extends('layouts.app-fox')

@section('title', 'Admin Username')

@section('admin_before')
<link href="{{ asset('css/admin.css') }}" type="text/css" rel="stylesheet" />
<link href="{{ asset('vendor/c3chart/c3.min.css') }}" type="text/css" rel="stylesheet" />
@stop

@section('content')


<div class="row">
    <div class="col-md-10 col-lg-10 offset-md-1 offset-lg-1">
        <div class="container-fluid">

        <!--top dashboard-->

            <div class="row">
                <div class="col-lg-7 col-12">
                    
                    <!--page title-->
                    <div class="page-title mb-4 d-flex align-items-center">
                        <div class="mr-auto">
                            <h4 class="weight500 d-inline-block pr-3 mr-3">Analytics</h4>
                        </div>
                    </div>


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
                    @include('analytics/world_map')
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
                @include('analytics/map')
                </div>
                <div class="col-xl-4 col-md-5">
                @include('analytics/site_activity')
                </div>
            </div>
            <!--/sales report & active user-->

            <!--sales monitor-->
            <div class="row">
                <div class="col-12">
                    @include('analytics/sales_report_chart')
                </div>
            </div>
            <!--/sales monitor-->

            <!--member performance & support ticket (only show for the one model)-->
            <div class="row">
                <div class="col-xl-6">
                    @include('analytics/models_performance')
                </div>
                <div class="col-xl-6">
                    @include('analytics/model_applications')
                </div>
            </div>
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