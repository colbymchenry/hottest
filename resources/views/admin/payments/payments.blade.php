@extends('layouts.app-fox')

@section('title', 'Admin Payments')

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
                <li class="breadcrumb-item active" aria-current="page">Payments</li>
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
                    <div class="custom-title">Payments</div>
                </div>
            </div>
            <div class="pt-3 pb-4">
                <div class="table-responsive">
                    <table id="payments-ajax-datatable" class="display table table-bordered table-striped" cellspacing="0">
                        <thead>
                        <tr class="payments-tr">
                            <th>ID</th>                                  
                            <th>Reason</th>
                            <th>Amount</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>ID</th>                                  
                            <th>Reason</th>
                            <th>Amount</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
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