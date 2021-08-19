@extends('layouts.app-fox')

@section('title')

@section('content')

<!--<div class="flex-center position-ref full-height">-->
   <!-- @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif -->

    <!--</div>-->
    <div class="row top-gap-big">
        <div class="col-md-10 offset-md-1">
            <div class="search">
                <form class="form-inline position-relative chat-relative">
                    <input type="search" class="form-control" id="conversations" placeholder="Search for model...">
                    <button type="button" class="btn btn-link loop"><i class="material-icons">search</i></button>
                </form>							
            </div>
           <!-- <div class="list-group sort">
                <a href="{{ url('/models') }}" class="btn active">Featured</a>
                <a href="{{ url('/models/list') }}" class="btn">Top 100</a>       
          
            </div>	-->
        </div>
        <!--<div class="col-md-8 offset-md-2">
            <div class="big-side">
                <a href="{{ url('/top') }}">view all <i class="fas fa-arrow-right"></i></a>
                <span>Hotter</span>
                <h1 class="title">Featured</h1>	
                
            </div>
        </div>-->
        <div class="col-md-8 offset-md-2 mb-20">
        <!-- Slider main container -->
        <div class="swiper-container gallery-thumbs">
                <div class="swiper-wrapper">
                    <div class="swiper-slide text-center">                 
                        <div class="photo" id="avatar-div">
                            <img class="avatar-xxl"
                                    src="{{ asset('dist/users/01_miss_julianne/uploads/profile/user_upload_profile_27-02-19_old.png') }}"
                                    alt="Modelname">
                        </div>

                        <span class="badge badge-secondary" style="margin-bottom:15px;">Featured</span>
                    </div>
                    <div class="swiper-slide">                 
                        <div class="photo" id="avatar-div">
                            <img class="avatar-xxl"
                                    src="{{ asset('dist/users/01_miss_julianne/uploads/profile/user_upload_profile_27-02-19.png') }}"
                                    alt="Modelname">
                        </div>
      
                        <span class="badge badge-secondary" style="margin-bottom:15px;">Featured</span>                
                    </div>
                    <div class="swiper-slide">                 
                        <div class="photo" id="avatar-div">
                            <img class="avatar-xxl"
                                    src="{{ asset('dist/users/01_miss_julianne/uploads/profile/user_upload_profile_27-02-19_old.png') }}"
                                    alt="Modelname">
                        </div>
    
                    </div>
                    <div class="swiper-slide">                 
                        <div class="photo" id="avatar-div">
                            <img class="avatar-xxl"
                                    src="{{ asset('dist/users/01_miss_julianne/uploads/profile/user_upload_profile_27-02-19.png') }}"
                                    alt="Modelname">
                        </div>
                       
                    </div>
                    <div class="swiper-slide">                 
                        <div class="photo" id="avatar-div">
                            <img class="avatar-xxl"
                                    src="{{ asset('dist/users/01_miss_julianne/uploads/profile/user_upload_profile_27-02-19_old.png') }}"
                                    alt="Modelname">
                        </div>

                    </div>
                </div>
            </div>      
            <div class="swiper-container gallery-top hidden">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide">

                    @include('home/model')      
                    </div> 
                    <div class="swiper-slide">

                    @include('home/model')      
                    </div>    
                    <div class="swiper-slide">

                    @include('home/model')      
                    </div>  
                    <div class="swiper-slide">

                    @include('home/model')      
                    </div>     
                    <div class="swiper-slide">

                    @include('home/model')      
                    </div>                                          
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>           
            </div>

                        <!-- If we need navigation buttons -->
    <div class="swiper-button-prev mobile-gone"></div>
    <div class="swiper-button-next mobile-gone"></div>
        </div>

    </div>
</div>





<div class="row model-container">
<div class="col-md-8 offset-md-2">
       <!-- start main col --->
<!-- Grid -->
<div class="box-grid feed-grid row">

    <div class="grid-sizer col-4"></div>
    

            @for ($f = 0; $f < 9; $f++)
              <div class="grid-item anime-item work-item col-4 private public {{ $f }}" id="img41t">
                    <div class="flame-it mobile-gone" id="img41d" data-idd="img41t">
                            <i class="material-icons">whatshot</i>
                        </div>
                
                        <div class="box modal-ui-trigger" id="img41" data-idt="img41t" data-ido="img41o" data-description="" data-time="2 days ago" data-height="1024" data-width="689" data-tags="," data-url="http://162.243.166.8/images/15cbae1327282b.jpg" data-vip="0" data-access="">
                            <div class="box-cover">
                                <div class="box-img" style="background-image: url('http://162.243.166.8/images/15cbae1327282b.jpg')"></div>
                                <div class="box-hover">
                                    <!-- <span class="status">
                                        <i class="material-icons">lock</i>
                                    </span>-->
                                </div>

                                <div class="main-details">
                                    <div class="icons-row"><!--
                                                    <div class="icons-column">
                                                            <div class="name">Miss Julianne</div>
                                                    </div>-->
                                        <div class="icons-column">
                                            <i class="material-icons">lock</i> VIP
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="mobile-gone">
                            <div class="work-info">
                                <div class="box-inner">
                                    <h4 class="box-inner__search"></h4>
                                    <p class="box-inner__title"></p>
                                </div>
                            </div>
                        </div>
                   </div>
                                  
               @endfor

              


        </div>

    </div>
</div>


<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="container mb-20">
            <div class="big-side">
                <a href="{{ url('/top') }}">view all <i class="fas fa-arrow-right"></i></a>
                <span>Models</span>
                <h1 class="title">Leaderboard</h1>	
                
            </div>
        </div>
    </div>

    <div class="col-md-8 offset-md-2">
        <div class="container models">
            <div class="list-group" id="models" role="tablist">
                    @for ($i = 0; $i < 3; $i++)
                    
                    @include('home/showcase')
                    
                    @endfor                                                                                                                            
            </div>        
        </div>
    </div>
</div>
@endsection