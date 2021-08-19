<div class="card card-shadow mb-4">
    <div class="card-header border-0">
        <div class="custom-title-wrap bar-primary">
            <div class="custom-title">Sales Report</div>
            <div class=" widget-action-link">
                <div class="dropdown">
                    <a href="index.html#" class="btn btn-transparent text-secondary dropdown-hover p-0" data-toggle="dropdown">
                        <i class=" vl_ellipsis-fill-h"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right vl-dropdown">
                        <a class="dropdown-item" href="index.html#"> Edit</a>
                        <a class="dropdown-item" href="index.html#"> Delete</a>
                        <a class="dropdown-item" href="index.html#"> Settings</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row text-center mb-4">
            <div class="col-4">
                <h4 class="mb-0">$120 <i class="fa fa-long-arrow-up text-success f14"></i></h4>
                <small class="text-muted text-uppercase">Today's Sales</small>
            </div>
            <div class="col-4">
                <h4 class="mb-0">$740 <i class="fa fa-long-arrow-down text-danger f14"></i></h4>
                <small class="text-muted text-uppercase">This Week Sales</small>
            </div>
            <div class="col-4">
                <h4 class="mb-0">$3740 <i class="fa fa-long-arrow-up text-success f14"></i></h4>
                <small class="text-muted text-uppercase">This Month Sales</small>
            </div>
        </div>
        <div>
            <canvas id="sales_report_chart" height="320"></canvas>
        </div>
    </div>
</div>