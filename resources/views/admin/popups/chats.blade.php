<div class="modal fade" id="chatsOpen" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="requests">
			<div class="title">
				<h1>Chats</h1>
				<button type="button" class="btn" data-dismiss="modal" aria-label="Close" id="close-chat-button"><i class="material-icons">close</i></button>
			</div>
			<div class="content">
                
                <!-- Start of Discussions -->
                <div class="discussions">
                    <div class="list-group nav-tabs" id="chats" role="tablist">

                        <a href="goes to their convo" data-type="page-transition" class="filterDiscussions all unread single nav-item" id="list-chat-list">
                            <img class="avatar-md" src="{{ asset('images/defaults/user_logo.png') }}" data-toggle="tooltip" data-placement="top" title="" alt="avatar" data-original-title="Username">
                            <div class="status">
                                <i class="material-icons online">fiber_manual_record</i>
                            </div>
                            <div class="new bg-green">
                                <span>+1</span>
                            </div>
                            <div class="data">
                                <h5>John Doe</h5>
                                <span>Mon</span>
                                <p>Either part of last message here or just "waiting reply"...</p>
                            </div>
                        </a>									
                        <a href="goes to their convo" data-type="page-transition" class="filterDiscussions all unread single nav-item" id="list-empty-list">
                            <img class="avatar-md" src="{{ asset('dist/users/01_miss_julianne/uploads/profile/user_upload_profile_27-02-19.png') }}" data-toggle="tooltip" data-placement="top" title="" alt="avatar" data-original-title="Username">
                            <div class="status">
                                <i class="material-icons offline">fiber_manual_record</i>
                            </div>
                            <div class="new bg-green">
                                <span>+1</span>
                            </div>
                            <div class="data">
                                <h5>Miss Julianne</h5>
                                <span>Sun</span>
                                <p>This is what user sees here</p>
                            </div>
                        </a>	
            
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>