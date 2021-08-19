<script>
    $(document).ready(function () {
        var followURL = '/model/follow/{{ $model->getUser()->id }}';
        var unfollowURL = '/model/unfollow/{{ $model->getUser()->id }}';
        var following = ('{{ Auth::user()->isFollowing($model->getUser()->id) }}' === '1');

        $('#follow-btn').on('click touchstart', function (e) {
            e.preventDefault();
            var thisBTN = $(this);

                    @if(Auth::user()->id !== $model->getUser()->id)
            var url = following ? unfollowURL : followURL;

            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: {
                    _token: token
                },
            }).done(function (msg) {
                if (msg['success']) {
                    var html = null;
                    thisBTN.empty();
                    if (url === followURL) {
                        following = true;
                        html = '\
                            Following\
                            <i class="fas fa-check m-l-3"></i>\
                            ';
                    } else {
                        following = false;
                        html = '\
                            Follow\
                            ';
                    }
                    thisBTN.append(html);
                }
            });
            @else
            $.ajax({
                url: '/followers',
                type: 'GET',
                dataType: 'json',
                data: {
                    _token: token
                },
            }).done(function (msg) {
                if (msg['success']) {
                    var html = null;

                    msg['followers'].forEach(function(elem) {
                        html = `
                        <a href="#" class="filterMembers all model" id="follower-` + elem[0]['id'] + `" data-toggle="list">
                                <img class="avatar-md" src="{{ asset('dist/users/01_miss_julianne/uploads/profile/user_upload_profile_27-02-19_old.png') }}" data-toggle="tooltip" data-placement="top" title="" alt="avatar" data-original-title="` + elem['name'] + `">
                                <div class="data">
                                    <h5>` + elem[0]['name'] + `</h5>
                                    <p>
                                    <span class="badge-followers">Subscriber</span>

                                    </p>
                                </div>
                               
                                <div class="person-add">
                                    <button type="submit" class="follow-button">Following</button>
                                </div>
                            </a>
                        `;

                        $('#followers-popup').append(html);
                    });
                }
            });
            @endif

        });

    });


</script>
