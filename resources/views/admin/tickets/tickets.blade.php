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
        <h4 class="weight500 d-inline-block pr-3 mr-3 border-right">Tickets</h4>
        <nav aria-label="breadcrumb" class="d-inline-block">
            <ol class="breadcrumb p-0">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tickets</li>
            </ol>
        </nav>
    </div>
</div>

<!--/page title-->
<div class="row">
    <div class="col-xl-12">
        <div class="card card-shadow mb-4">
        <div class="card-header border-0">
                <div class="custom-title-wrap bar-warning">
                    <div class="custom-title">Support Tickets</div>
                    <div class=" widget-action-link">
                        <div class="dropdown">
                            <a href="#" class="btn btn-transparent text-secondary dropdown-hover p-0" data-toggle="dropdown">
                                Action <i class="fa fa-caret-down pl-2"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right vl-dropdown">
                                <a class="dropdown-item" href="#"> Close</a>
                                <a class="dropdown-item" href="#"> Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


                        <div class="card-body- pt-3 pb-4">
                            <div class="table-responsive">
                                <table id="tickets-table" class="table table-striped" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Tickets</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Tickets</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>

                                    <tr class="list-unstyled mb-0 list-widget" id="ticketid" onclick="window.location.href='tickets/open'">
                                        <td>
                                            <div class="media">

                                                <div class="mr-3 rounded-circle bg-turquoise st-number">
                                                    54
                                                </div>
                                                <div class="media-body">
                                                    <div class="float-left">
                                                        <h6 class="text-uppercase mb-0">Username <span class="text-success pl-3">new</span></h6>
                                                        <span class="text-muted">I am facing some trouble with my payment. When i click the</span>
                                                    </div>
                                                    <div class=" float-right">
                                                        <small class="text-muted">8:40 PM</small>
                                                        <input type="checkbox" name="ticketid" value="ticketid">
                                                    </div>
                                                </div>

                                            </div>
                                        </td>
                                    </tr>

                                    <tr class="list-unstyled mb-0 list-widget" id="ticketid" onclick="window.location.href='tickets/open'">                                     
                                        <td>
                                            <div class="media">
                                                <div class="mr-3 rounded-circle bg-orange st-number">
                                                    53
                                                </div>                                               
                                                <!--<div class="mr-3">
                                                    <input type="checkbox" name="ticketid" value="ticketid">
                                                </div>-->
                                                <div class="media-body">
                                                    <div class="float-left">
                                                        <h6 class="text-uppercase mb-0">Username <span class="text-warning pl-3">pending</span></h6>
                                                        <span class="text-muted">I am facing some trouble with my payment. When i click the</span>
                                                    </div>
                                                    <div class="float-right">
                                                        <small class="text-muted">8:40 PM</small>
                                                        <input type="checkbox" name="ticketid" value="ticketid">
                                                    </div>
                                                </div>

                                            </div>
                                        </td>
                                    </tr>                                   
                                    </tbody>
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

@include('admin/tickets/tickets-js')
<!-- admin page js -->
<script src="{{ asset('js/admin.js') }}"></script>

@stop