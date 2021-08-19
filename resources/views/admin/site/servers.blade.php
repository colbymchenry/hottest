@extends('layouts.app-fox')

@section('title', 'Admin Competitions')

@section('admin_before')
<link href="{{ asset('css/admin.css') }}" type="text/css" rel="stylesheet" />
@stop

@section('admin_side')
    @include('admin/includes/side')
@stop

@section('content')

<!--page title-->
<div class="page-title mb-4 d-flex align-items-center">
    <div class="mr-auto">
        <h4 class="weight500 d-inline-block pr-3 mr-3 border-right">Payments</h4>
        <nav aria-label="breadcrumb" class="d-inline-block">
            <ol class="breadcrumb p-0">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Admin</a></li>
                <li class="breadcrumb-item"><a href="/admin/dashboard">Site</a></li>
                <li class="breadcrumb-item active" aria-current="page">Servers</li>
            </ol>
        </nav>
    </div>
</div>

<!--/page title-->
<div class="row">
    <div class="col-xl-12">
        <div class="card card-shadow mb-4">
            <div class="card-header border-0">
                <div class="custom-title-wrap bar-primary">
                    <div class="custom-title">Servers</div>
                </div>
            </div>
           <!-- servers space and users with most usage -->
        </div>
    </div>
</div>

@endsection

@section('admin_after')

<!--datatables-->
<script src="{{ asset('vendor/data-tables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/data-tables/dataTables.bootstrap4.min.js') }}"></script>

@include('admin/payments/payments-js')
<!-- admin page js -->
<script src="{{ asset('js/admin.js') }}"></script>

@stop