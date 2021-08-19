@if (Route::has('login'))
    @auth
        @if ((((strpos(Request::path(), 'model/') == 'model/')) && ((strpos(Request::path(), 'model/username/media') != 'model/username/media'))) || ((strpos(Request::path(), 'chat') == 'chat')))
        @include('chat/create_popup')
        @endif
        @if(Auth::user()->is_model)
            @include('profile/upload_image_popup')
            @include('profile/followers_popup')
        @endif
        @if(isset($model))
            @include('profile/snapchat_popup')
            @include('profile/username_popup')
            @include('profile/message_popup')
            @include('profile/private_settings_popup')
        @endif
        @if ((strpos(Request::path(), 'open') == true))
            @include('chat/credits_popup')
        @endif

        @include('profile/account_type_popup')
        @include('profile/report_popup')
@endauth
@endif
    @include('profile/view_image_popup')