@extends('layouts.app-fox')

@section('content')
<div class="row top-gap">
    <div class="col-md-8 offset-md-2">
        <div class="big-middle">
            <h1 class="big-title">Top 100</h1>	
            <span>Models</span>
        </div>

        <div class="container models">
			<div class="list-group" id="models" role="tablist">
                @for ($i = 0; $i < 50; $i++)
                
                @include('home/showcase')
                
                @endfor                                                                                                                            
			</div>        
        </div>
    </div>
</div>

@endsection