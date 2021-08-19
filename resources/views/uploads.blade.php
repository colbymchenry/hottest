<!-- all unlisted photos -->

@extends('layouts.app-fox')

@section('content')

<div class="model-container">
    <div class="row">

        <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="top top-models">
						
						<div class="inside">
							<a href="javascript:history.back()" class="blank-icon"><i data-eva="arrow-ios-back"></i></a>

							<div class="profile text-sm-center">

                                <h5>Unlisted</h5>
                              
                            </div>	
                            
                            @if(Auth::user()->is_model)
                            <a href="#" data-toggle="modal" data-target="#uploadImageModal" class="blank-icon"><i data-eva="plus-square-outline"></i></a>
                            @else
                            <div class="dropdown">
                                <a class="btn blank-icon" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false"><i data-eva="more-horizontal"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <span class="dropdown-item connect"><i data-eva="star-outline"></i>Subscribe</span>
                                    <span class="dropdown-item connect" data-toggle="modal" data-target="#ReportModal"><i data-eva="alert-circle-outline"></i>Report Page</span>
                                </div>
                            </div>
                            @endif
						</div>
						
                    </div>

                    <div class="top-gap">
                        @include('uploads/upload-grid')
                    </div>

        </div>

    </div>
</div>


@endsection