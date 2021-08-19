<!-- all unlisted photos -->

@extends('layouts.app-fox')

@section('content')

<div class="model top-gap">
   <div class="row">
       <!-- start main col --->
	   <div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 feed-pad">
                @include('favorites/favorites-grid')
        </div>

    </div>

</div>



@endsection