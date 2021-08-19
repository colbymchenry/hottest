<!-- Start of Discussions -->
<div class="discussions">
    <div class="search">
		<form class="form-inline position-relative chat-relative">
		    <input type="search" class="form-control" id="conversations" placeholder="Search for conversations...">
		    <button type="button" class="btn btn-link loop"><i class="material-icons">search</i></button>
		</form>							
    </div>
    <div class="list-group nav-tabs" id="chats" role="tablist">

		@foreach($conversations as $convo)
			@if ((sizeof(Message::getUnreadMessages($convo->sender_id, Auth::user()->id))) > 0)
            <a href="{{ url('/chat/open/' . (Auth::user()->id == $convo->sender_id ? $convo->receiver_id : $convo->sender_id)) }}"
			   data-type="page-transition" class="filterDiscussions all unread single nav-item" id="list-chat-list">
			@else
			<a href="{{ url('/chat/open/' . (Auth::user()->id == $convo->sender_id ? $convo->receiver_id : $convo->sender_id)) }}"
			   data-type="page-transition" class="filterDiscussions all read single nav-item" id="list-chat-list">
			@endif
                <img class="avatar-md" src="{{ User::where('id', $convo->sender_id == Auth::user()->id ? $convo->receiver_id : $convo->sender_id)->get()[0]->getAvatar() }}" data-toggle="tooltip"
                     data-placement="top" title="" alt="avatar" data-original-title="Username">
				@if ((sizeof(Message::getUnreadMessages($convo->sender_id, Auth::user()->id))) > 0)
                <div class="new bg-green">
					<span>+{{ sizeof(Message::getUnreadMessages($convo->sender_id, Auth::user()->id)) }}</span>
                </div>
				@endif
                    
                <div class="data">
                    <h5>{{ ($convo->sender_id == Auth::user()->id ? User::where('id', $convo->receiver_id)->get()[0]->name :  User::where('id', $convo->sender_id)->get()[0]->name) }}</h5>
                    <span>{{ $convo->getPreviewDateStamp() }}</span>
                    <p>{{ strlen($convo->message) > 30 ? substr($convo->message, 0, 30) . '...' : $convo->message }}</p>
                </div>
            </a>
        @endforeach
    </div>
</div>

<!-- End of Discussions -->