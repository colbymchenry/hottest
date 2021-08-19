@extends('layouts.app-fox')

@section('content')

<!-- shows full image -->
<div class="row">

    <div class="col-lg-8 col-md-12 col-sm-12">

        <div class="row">
    			   <!-- -->
                   <div class="grid-item anime-item work-item col-12 public">
                           <div class="full work-image media-full-item" style="max-width:1920px; height:65vh"> 
                                            <!--- Important: max-width must change depending on image width -->
							   <div class="box-cover">
								   <div class="full-img" style="background-image: url('{{ asset('dist/users/01_miss_julianne/uploads/photo4.jpg') }}')"></div>
								   <div class="box-hover">
									   <span class="favorite">
                                           <button class="btn" data-toggle="tooltip" data-placement="top" title="Flame it"><i class="material-icons">whatshot</i></button>
                                           <!-- model sees 
                                           <button class="btn" data-toggle="modal" data-target="#uploadModal"><i class="material-icons">lock</i></button>
                                            -->
                                        </span>
								   </div>
							   </div>
                            </div>
						   <div >
							   <div class="work-info">
								   <div class="box-inner">
									   <span class="box-inner__cat">3 weeks ago</span>
									   <h4 class="box-inner__title">443 <i class="material-icons">whatshot</i></h4>
								   </div>
							   </div>
                            </div>
					   </div>
                   <!-- /-->

        </div>

        <div class="row">
		   		<div class="col-md-8 filtr-btn">
					<p>Tags: </p>
					<span class="badge badge-primary" data-filter=".private">Feet</span>
					<span class="badge badge-primary" data-filter=".public">Sexy</span>
					<span class="badge badge-primary" data-filter=".unlisted">Romanian</span>
					<span class="badge badge-primary" data-filter=".private">Outside</span>
					<span class="badge badge-dark" data-filter=".unlisted">VIP</span>
                </div>
                <div class="col-md-8">
                    <p>At the beach.</p>
                </div>
			</div>
                   


    </div>

    <div class="col-lg-4 col-md-12 col-sm-12">
  
        <div class="model media-side">
    
            <div class="profile">

					   <button class="btn folw" data-toggle="tooltip" data-placement="top" title="Follow"><i class="material-icons">star</i></button>
					   <button class="btn msg" data-toggle="modal" data-target="#startnewchat"><i class="material-icons">chat_bubble</i></button>
                        <a href="{{ url('/model/Rob') }}">
					        <img class="avatar-xxl" src="{{ asset('dist/users/01_miss_julianne/uploads/profile/user_upload_profile_27-02-19.png') }}" alt="Miss Julianne">
                            <h1>Miss Julianne</h1>
                        </a>
					   <!--<span>Super Model</span>-->
					   <div class="award-tray">
						   
						   <i class="material-icons awards top-poster" data-toggle="tooltip" data-placement="top" title="Top Poster">trending_up</i>
						   <i class="material-icons awards most-hearts" data-toggle="tooltip" data-placement="top" title="Most Hearts">favorite</i>
						   <i class="material-icons awards most-subscribers" data-toggle="tooltip" data-placement="top" title="Top 10 Subscribers">stars</i>
						   <i class="material-icons awards most-active" data-toggle="tooltip" data-placement="top" title="Top VIP Poster">lock</i>
						   <i class="material-icons awards super-model" data-toggle="tooltip" data-placement="top" title="Super Model Status">stars</i>
						   
					   </div>

				   <!--<div class="col-3">
					   <ul>
						   <li><span class="badge badge-primary">21 years old</span></li>
						   <li><span class="badge badge-primary">brazillian</span></li>
						   <li><span class="badge badge-primary">5' 10</span></li>
						   <li><span class="badge badge-primary">brown hair</span></li>
					   </ul>
				   </div>-->
				   <div class="stats">
		   
						   <!--<div class="item">
							   <h2>22</h2>
							   <h3>Photos</h3>
						   </div>-->
						   <div class="item">
							   <h2>165</h2>
							   <h3>Total Photos</h3>
						   </div>	
						   <div class="item grid-filter-toggle" data-toggle="tooltip" data-placement="bottom" title="Unlock Content">
							   <button class="btn vip-view" data-toggle="modal" data-target="#vipagree" data-filter=".private"><i class="material-icons">lock</i></button>
							   <h2>VIP</h2>
						   </div>																			
						   <div class="item">
							   <h2>143</h2>
							   <h3>VIP Photos</h3>
						   </div>																																				
					   
                       </div>
                    </div>
            <!-- end profile -->

            <!-- show only latest 3 photos -->
            @include('profile/grid')
</div>
        
            <!-- end model -->
        </div>
           
           
    <!-- end col -->
    </div>

</div>

@endsection