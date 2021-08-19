<div class="card card-shadow mb-4">
    <div class="card-header border-0">
        <div class="custom-title-wrap bar-danger">
            <div class="custom-title">
                Photo Count
                <ul class="nav nav-pills nav-pill-primary nav-pill-custom nav-pills-sm float-right " id="pills-tab2" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-tabContent2" data-toggle="pill" href="#pills-weekly2" role="tab" aria-selected="true">Weekly</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-tabContent2" data-toggle="pill" href="#pills-total2" role="tab" aria-selected="false">Total</a>
                    </li>
                </ul>
            </div>
            <div class="custom-post-title">Comparison of total photos</div>
        </div>
    </div>
    <div class="card-body pt-5 pb-4">
        <div class="tab-content" id="pills-tabContent2">
            <div class="tab-pane fade show active" id="pills-weekly2" role="tabpanel">
                <div class="row">
                    <div class="col-12 col-xl-7 col-md-6 text-center">
                        <canvas id="doughnut_chart" class="mb-4" ></canvas>
                        <small class="text-muted">Weekly Overview</small>
                    </div>
                    <div class="col-12 col-xl-4 col-md-6 text-muted mt-xl-4">
                        <ul class="list-unstyled f12">
                            <li class="list-widget-border mb-3 pb-3">
                                <i class="fa fa-circle pr-2" style="color: #cae59b"></i> 25
                                <span class="float-right">Public Photos</span>
                            </li>
                            <li class="list-widget-border mb-3 pb-3">
                                <i class="fa fa-circle pr-2" style="color: #f79490"></i> 30
                                <span class="float-right">VIP Photos</span>
                            </li>
                            <li class="list-widget-border mb-3 pb-3">
                                <i class="fa fa-circle pr-2 " style="color: #fcdd82"></i> 45
                                <span class="float-right">Unlisted Photos</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-total2" role="tabpanel">
                <div class="row">
                    <div class="col-12 col-xl-7 col-md-6 text-center">
                        <canvas id="doughnut_chart2" class="mb-4"></canvas>
                        <small class="text-muted">Total Overview</small>
                    </div>
                    <div class="col-12 col-xl-4 col-md-6 text-muted mt-xl-4">
                        <ul class="list-unstyled f12">
                            <li class="list-widget-border mb-3 pb-3">
                                <i class="fa fa-circle pr-2" style="color: #cae59b"></i> 30
                                <span class="float-right">Public Photos</span>
                            </li>
                            <li class="list-widget-border mb-3 pb-3">
                                <i class="fa fa-circle pr-2" style="color: #f79490"></i> 50
                                <span class="float-right">VIP Photos</span>
                            </li>
                            <li class="list-widget-border mb-3 pb-3">
                                <i class="fa fa-circle pr-2 " style="color: #fcdd82"></i> 45
                                <span class="float-right">Unlisted Photos</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>