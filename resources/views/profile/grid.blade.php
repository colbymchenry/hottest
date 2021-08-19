	
			
			<!-- Grid -->
			   <div class="box-grid profile-grid row">
			   
				   <div class="grid-sizer col-4"></div>
				   
						   <!-- This uses isotope, the JS required is on app-fox.blade.php
								   You can append, remove etc. grid-items with jquery 
								   Look up the documentation https://isotope.metafizzy.co/methods.html
							-->
				   
					   <!-- UPLOAD: ** model only **
									must always be top grid-item
									has all filters listed to keep top (not sure if best way)

									when clicked popup browse file, then once uploaded a modal shows with the same grid item
									showing the image in it, maybe resize/crop by moving image around grid item frame,
									they can select the permission for who can see, add a title/description,
									then click check mark, appends new grid item just after the upload image grid item
									hopefully without page ever reloading

									
						--><!--
					   <div class="grid-item col-4 unlisted private public" id="imgid">
						   <a class="box upload-image" title="Photo Description">
							   <div class="box-cover unlisted">
								   <div class="box-img"></div>
								   <div class="box-hover" id="upload-img-div">
									   <span class="status">
										   <button class="btn"><i class="material-icons">add</i></button>
										   
									   </span>
								   </div>
							   </div>
						   </a>
						   <a class="image-popup-vertical-fit">
							   <div class="work-info">
								   <div class="box-inner">
									   <span class="box-inner__cat"></span>
									   <h4 class="box-inner__title">Upload</h4>
								   </div>
							   </div>
						   </a>
					   </div>-->
				   <!-- /Upload -->
				   

				   		<!-- Private Photo (what model sees, button pops up image settings) -->
						<div class="grid-item anime-item work-item col-4 public" id="imgid">
						   <div class="box work-image">
							   <div class="box-cover">
							   		<a href="{{ url('/model/Rob/media') }}">	   
							   			<div class="box-img" style="background-image: url('{{ asset('dist/users/01_miss_julianne/uploads/photo3.jpg') }}')"></div>
									</a>
								   <div class="box-hover">
								   		<span class="status">
										   <button class="btn"><i class="material-icons">whatshot</i></button>
									   </span>
								   </div>
							   </div>
						</div>
						   <a href="#">
							   <div class="work-info">
								   <div class="box-inner">
									   <span class="box-inner__cat">3 weeks ago</span>
									   <h4 class="box-inner__title">443 <i class="material-icons">whatshot</i></h4>
								   </div>
							   </div>
						   </a>
					   </div>
				   <!-- /Private ALBUM-->


				   
				   <!-- Public Item (what users see, heart favorites photo) -->
					   <!--<div class="grid-item anime-item work-item col-4 public" id="imgid">
						   <div class="box work-image image-popup-vertical-fit">
						   
						   		<a class="add-wishlist modal-ui-trigger" href="" data-trigger-for="wishlist">
								   <i class="material-icons">search</i>
							   </a>
							   <div class="box-cover">
							   	<a href="{{ url('/model/Rob/media') }}">	
								   <div class="box-img" style="background-image: url('{{ asset('dist/users/01_miss_julianne/uploads/photo2.jpg') }}')"></div>
								</a>
								   <div class="box-hover">
									   
								   </div>
							   </div>
							   <div class="main-details">

								   <div class="icons-row">
									   <div class="icons-column">
										   <i class="material-icons">whatshot</i>43
									   </div>
									   <div class="icons-column">
									   		<div class="name">Miss Julianne</div>
									   </div>	
									   <div class="icons-column">
									   		<i class="material-icons">lock</i> VIP
									   </div>									   							   
								   </div>
								</div>
							</div>
						   <a href="{{ url('/model/Rob/media') }}">
							   <div class="work-info">
								   <div class="box-inner">
									   <span class="box-inner__cat">2 weeks ago</span>
									   <h4 class="box-inner__title">546 <i class="material-icons">whatshot</i></h4>
								   </div>
							   </div>
						   </a>
					   </div>-->
				   <!-- /Private Item -->

				   <!-- Private Photo (what model sees, button pops up image settings) -->
					   <div class="grid-item anime-item work-item col-4 public" id="imgid">
						   <div class="box work-image">
							   <div class="box-cover">
							   		<a href="{{ url('/model/Rob/media') }}">	   
							   			<div class="box-img" style="background-image: url('{{ asset('dist/users/01_miss_julianne/uploads/photo4.jpg') }}')"></div>
									</a>
								   <div class="box-hover">
								   		<span class="status">
										   <button class="btn" data-toggle="modal" data-target="#uploadModal"><i class="material-icons">lock</i></button>
									   </span>
								   </div>
							   </div>
						</div>
						   <a href="#">
							   <div class="work-info">
								   <div class="box-inner">
									   <span class="box-inner__cat">3 weeks ago</span>
									   <h4 class="box-inner__title">443 <i class="material-icons">whatshot</i></h4>
								   </div>
							   </div>
						   </a>
					   </div>
				   <!-- /Private ALBUM-->
				   

				   <!-- Private Item Preview -->
					   <div class="grid-item anime-item work-item col-4 private">
						   <a href="{{ url('/model/Rob/media') }}" class="box work-image" data-type="page-transition">
							   <div class="box-cover">
								   <div class="box-img" style="background-image: url('{{ asset('dist/users/01_miss_julianne/uploads/photo2.jpg') }}')"></div>
								   <div class="box-hover">
									   <span class="status">
										   <i class="material-icons">star</i>
									   </span>
								   </div>
							   </div>
						   </a>
						   <a href="{{ url('/model/Rob/media') }}" data-type="page-transition">
							   <div class="work-info">
								   <div class="box-inner">
									   <span class="box-inner__cat">5 weeks ago</span>
									   <h4 class="box-inner__title">34 <i class="material-icons">whatshot</i></h4>
								   </div>
							   </div>
						   </a>
					   </div>
				   <!-- /Private Item Unlocked-->
				   
				   <!-- Private Item Locked (blur shows for all private locked images until subscription & logged in) -->
					   <div class="grid-item anime-item work-item col-4 private">
						   <a href="#" class="box locked-image">
							   <div class="box-cover locked">
								   <div class="box-img" style="background-image: url('')"></div>
								   <div class="box-hover">
									   <span class="status">
										   <i class="material-icons">lock</i>
									   </span>
								   </div>
							   </div>
						   </a>
						   <a href="#" data-type="page-transition">
							   <div class="work-info">
								   <div class="box-inner">
									   <span class="box-inner__cat">5 weeks ago</span>
									   <h4 class="box-inner__title">34 <i class="material-icons">whatshot</i></h4>
								   </div>
							   </div>
						   </a>
					   </div>
				   <!-- /Private Item Locked -->
				   
				   <!-- Private Item (shows for model) -->
					   <div class="grid-item anime-item work-item col-4 private">
						   <a href="{{ url('/model/Rob/media') }}" class="box work-image" data-type="page-transition">
							   <div class="box-cover">
								   <div class="box-img" style="background-image: url('{{ asset('dist/users/01_miss_julianne/uploads/photo2.jpg') }}')"></div>
								   <div class="box-hover">
									   <span class="status">
										   <i class="material-icons">lock</i>
									   </span>
								   </div>
							   </div>
						   </a>
						   <a href="{{ url('/model/Rob/media') }}" data-type="page-transition">
							   <div class="work-info">
								   <div class="box-inner">
									   <span class="box-inner__cat">5 weeks ago</span>
									   <h4 class="box-inner__title">34 <i class="material-icons">whatshot</i></h4>
								   </div>
							   </div>
						   </a>
					   </div>
				   <!-- /Private Item Unlocked -->	                                
													   

				   <!-- Unlisted Item -->
					   <div class="grid-item anime-item work-item col-4 unlisted">
						   <a href="{{ url('/model/Rob/media') }}" class="box work-image" data-type="page-transition">
							   <div class="box-cover unlisted">
								   <div class="box-img" style="background-image: url('{{ asset('dist/users/01_miss_julianne/uploads/photo5.jpg') }}')"></div>
								   <div class="box-hover">
									   <span class="status">
										   <i class="material-icons">create</i>
									   </span>
								   </div>
							   </div>
						   </a>
						   <a href="{{ url('/model/Rob/media') }}" data-type="page-transition">
							   <div class="work-info">
								   <div class="box-inner">
									   <span class="box-inner__cat">16 weeks ago</span>
									   <h4 class="box-inner__title">345 <i class="material-icons">whatshot</i></h4>
								   </div>
							   </div>
						   </a>
					   </div>
				   <!-- /Unlited Item -->
  
				   

					   <!-- Image Cropper -->
					   <div class="grid-item col-4">
						   <a class="box edit-image">
							   <div class="box-cover upload">
								   <div class="box-img" style="background-image: url('assets/images/users/03_shrek/shrek.jpg') }}')"></div>
								   <div class="box-hover">
									   <span class="status">
										   <button id="delete"><i class="material-icons">create</i></button>
									   </span>
								   </div>
							   </div>
						   </a>
						   <a href="#" data-type="page-transition">
							   <div class="work-info">
								   <div class="box-inner">
									   <span class="box-inner__cat"></span>
									   <h4 class="box-inner__title">Edit Photo</h4>
								   </div>
							   </div>
						   </a>
					   </div>
					   <!-- /Upload -->
					   
					   <!-- Image Cropper Upload next for Album -->
					   <div class="grid-item col-4">
						   <a class="box upload-album">
							   <div class="box-cover unlisted">
								   <div class="box-img"></div>
								   <div class="box-hover">
									   <span class="status">
										   <button id="delete"><i class="material-icons">add</i></button>
									   </span>
								   </div>
							   </div>
						   </a>

						   <a href="#" data-type="page-transition">
							   <div class="work-info">
								   <div class="box-inner">
									   <span class="box-inner__cat"></span>
									   <h4 class="box-inner__title">Create Album</h4>
								   </div>
							   </div>
						   </a>
					   </div>
					   <!-- /Upload -->
					   
					</div>


@section('js')
	<script>
		$(document).ready(function() {
			$('#upload-img-div').on('click', function(e) {
				imageSubmit();
			});
		});
	</script>
@endsection