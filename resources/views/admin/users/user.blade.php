@extends('layouts.app-fox')

@section('title', 'Admin Username')

@section('admin_before')
<link href="{{ asset('css/admin.css') }}" type="text/css" rel="stylesheet" />
<link href="{{ asset('vendor/c3chart/c3.min.css') }}" type="text/css" rel="stylesheet" />
@stop

@section('admin_side')
    @include('admin/includes/side')
@stop


@section('content')

<p>Stuff about user payments, notes, total posts stuff that is not on analytics page</p>
<p>Reminders, emails, support tickets</p>

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