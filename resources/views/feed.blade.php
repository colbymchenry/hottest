<!-- this will be on link on home page showing top images before logging in -->

@extends('layouts.app-fox')

@section('content')

<div class="model top-gap">
   <div class="row">
       <!-- start main col --->
	   <div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 feed-pad">
	   		<!--<div class="row">
				<div class="col-md-12">
					<h5 class="pl-2">Feed</h5>
				</div>
			</div>

                <div class="row">
					<div class="col-md-12 filtr_tray">
						<div class="filtr-btn tags">
							<p>Top Tags: </p>
							<span class="badge badge-primary" data-filter=".private">Feet</span>
							<span class="badge badge-primary" data-filter=".public">Sexy</span>
							<span class="badge badge-primary" data-filter=".unlisted">Romanian</span>
							<span class="badge badge-primary" data-filter=".private">Outside</span>
							<span class="badge badge-dark" data-filter=".unlisted">VIP</span>
						</div>
						<div class="filtr-btn images">
							<span class="badge badge-primary" data-filter=".public">Public <span class="badge badge-light">4</span></span>
							<span class="badge badge-dark" data-filter=".private">VIP Private <span class="badge badge-light">4</span></span>
							<span class="badge badge-light bg-gray" data-filter=".unlisted">Unlisted <span class="badge badge-light">4</span></span>
						</div>					
					</div>					
				</div>-->


        <!-- show stream of following and ours -->
        @include('feed/grid')

        </div>
        <!-- end main col -->
    </div>
</div>



        
            

@endsection