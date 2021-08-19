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
        <h4 class="weight500 d-inline-block pr-3 mr-3 border-right">Settings</h4>
        <nav aria-label="breadcrumb" class="d-inline-block">
            <ol class="breadcrumb p-0">
                <a href="" class="breadcrumb-item"><a href="/admin/dashboard">Admin</a></a>
                <a href="" class="breadcrumb-item active" aria-current="page">Settings</a>
            </ol>
        </nav>
    </div>
</div>

<!--/page title-->
<div class="row">
    <div class="col-xl-12">

            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                
                        <div class="card-body">
                            <h5 class="card-title">Competitions</h5>
                            <p class="card-text">Site wide competitions.</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <a href="" class="list-group-item">Create Competition</a>
                            <a href="" class="list-group-item">Active Competitions</a>
                            <a href="" class="list-group-item">Previous Competitions</a>
                        </ul>
                    
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                
                        <div class="card-body">
                            <h5 class="card-title">Featured</h5>
                            <p class="card-text">Site wide featured models.</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <a href="" class="list-group-item">Current Featured</a>
                            <a href="" class="list-group-item">Previously Featured</a>
                            <a href="" class="list-group-item">Featured Settings</a>
                        </ul>
                    
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                
                        <div class="card-body">
                            <h5 class="card-title">Servers</h5>
                            <p class="card-text">Site wide servers.</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <a href="" class="list-group-item">View servers</a>
                            <a href="" class="list-group-item">Server usage</a>
                            <a href="" class="list-group-item">Server status</a>
                        </ul>
                    
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

@include('admin/tickets/tickets-js')
<!-- admin page js -->
<script src="{{ asset('js/admin.js') }}"></script>

@stop