<!-- Start of Create Chat -->
<div class="modal fade" id="startnewchat" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="requests">
			<div class="content">
				<div class="top top-chat">

					<div class="inside">
						<a href="#" data-dismiss="modal" aria-label="Close" class="round"><i data-eva="arrow-ios-back"></i></a>

						
						<div class="them text-sm-center">
						@if ((strpos(Request::path(), 'model') == 'model'))
							<a href="#" class="mobile-gone"><img class="avatar-md"
																src="{{ $model->getUser()->getAvatar() }}"
																data-toggle="tooltip" data-placement="top" title=""
																alt="avatar"
																data-original-title="{{ $model->getUser()->name }}"></a>

							<h5>{{ $model->getUser()->name }}</h5><!--{!! $model->getAtLink() !!} -->
							<span>Model</span>
							@endif
						</div>
					

						<div class="balance">
							<button class="tokens-button" data-toggle="modal" data-target="#creditsModal"><span
										id="credits-balance"></span><i class="fas fa-star"></i>
							</button>
							<p class="mobile-gone">
								<small>Credits</small>
							</p>
						</div>


					</div>
				</div>
				<div class="top-gap-big">
					<form id="create-chat-popup">
						@if ((strpos(Request::path(), 'model') != 'model'))
						<div class="form-group">
							<label for="participant">Recipient:</label>
							<input type="text" class="form-control" id="participant" placeholder="Search model..." autocomplete="off" required>
							<div class="userlist">
								<div class="container results" id="recipient-results"></div>
							</div>
						</div>
						@endif
						{{--<div class="form-group">--}}
							{{--<label for="topic">Topic:</label>--}}
							{{--<input type="text" class="form-control" id="topic" placeholder="What's the topic?" required="">--}}
						{{--</div>--}}
						<div class="form-group">
							<label for="message">Message:</label>
							<textarea class="text-control" id="chat-message" placeholder="A quality message with tip have a higher chance of reply..." required></textarea>
						</div>
						<div class="form-group">  
							<label for="message">Tip:</label>                           
							<div class="tokens-around text-center mb-20">
																										
									<div class="tokens-container active locked">	
										<div class="tip">
											<i class="fas fa-gift"></i>
										<!-- if not paid <i class="fas fa-lock"></i> -->
										</div>	                                                                       
										<div class="type-control"><input type="text" class="input-control" placeholder="2" autofocus/></div>
										<i class="fas fa-star tip-icon"></i>			
									</div> 
	
							</div>                           
									
						</div>
						@if(isset($model))
						<input type="text" style="display: none;visibility: hidden;" id="model-chat-id" value="{{ $model->getUser()->id }}"></input>
						@endif
						<button type="submit" class="button bg-private w-100">Start New Chat</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>