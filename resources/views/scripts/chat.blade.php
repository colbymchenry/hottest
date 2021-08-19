@auth
    {{-- TODO: Implement credits per message and free messages --}}
    {{-- TODO: Don't auto scroll down when typing or new message comes in if they are scrolled up, add an arrow they can click to scroll all the way down --}}

    <script type="text/javascript">
        var participantAvatar = '{{ isset($participant) ? $participant->getAvatar() : "" }}';
        var userAvatar = '{{ Auth::user()->getAvatar() }}';

        function getMessageHTML(me, message, timestamp, created_at) {
            return `
              	<div class="message ` + (me ? "me" : "") + `">
                    ` + (!me ? '<img class="avatar-md" src="' + (me ? userAvatar : participantAvatar) + '" data-toggle="tooltip" data-placement="top" title="" alt="avatar" data-original-title="Username">' : '') + `
                    <div class="text-main">
                        <div class="text-group ` + (me ? "me" : "") + `">
                            <div class="text ` + (me ? "me" : "") + `">
                                <p>` + message.replace(/\n/g, "<br />") + `</p>
                            </div>
                        </div>
                    <span data-timestamp="` + timestamp + `" data-datestamp="` + created_at + `"></span>
                    </div>
                </div>
                `;
        }

        function getImageHTML(me, id, url, credits, height, width, timestamp, created_at) {
            return `
                        <div class="message ` + (me ? "me" : "") + `">
                            <div class="text-main">
                                <div class="text-group ` + (me ? "me" : "") + `">

                                <div class="text image ` + (me ? "me" : "") + `">
                                    <div class="grid-item anime-item work-item col-12 private public" id="img` + id + `t">

                                        <div class="box modal-ui-trigger" id="img` + id + `" data-idt="img` + id + `t" data-ido="img` + id + `o" data-height="` + height + `" data-width="` + width + `" data-url="` + url + `" data-vip="0" data-access="">
                                            <div class="box-cover">
                                            <div class="box-img" style="background-image: url('` + url + `')"></div>
                                        <div class="box-hover">

                                    </div>

                                    <div class="main-details">
                                        <div class="tokens-container unlocked">
                                            <div class="tip">
                                                <i class="fas fa-check"></i>
                                    <!-- if not paid <i class="fas fa-lock"></i> -->
                                            </div>
                                            <div class="tip-control">` + credits + `</div>
                                                <i class="fas fa-star tip-icon"></i>
                                            </div>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="mobile-gone">
                                        <div class="work-info">
                                            <div class="box-inner">
                                                <h4 class="box-inner__search"></h4>
                                                <p class="box-inner__title">H: ` + height + ` W: ` + width + `</p>
                                            </div>
                                        </div>
                                    </div>
                                    </div>


                                </div>
                                </div>
                            <span data-timestamp="` + timestamp + `" data-datestamp="` + created_at + `"></span>
                            </div>
                        </div>
                `;
        }


        // Enable pusher logging - don't include this in production
        // Pusher.logToConsole = true;

        var pusher = new Pusher("{{ env('PUSHER_APP_KEY') }}", {
            encrypted: false,
            cluster: "{{ env('PUSHER_APP_CLUSTER') }}"
        });

        // Subscribe to the channel we specified in our Laravel Event
        var channel = pusher.subscribe('Chat.{{ Auth::user()->id }}');

        // This function is called when a chat message has been received (We want this on the layout) (the full Laravel class)
        channel.bind('App\\Events\\BroadcastChat', function (data) {
            if (!window.location.href.includes('/chat/open')) {
                Toast.fire({
                    type: 'info',
                    title: 'New message from ' + data.senderName
                });
            } else {
                var participantID = window.location.href.split('/')[window.location.href.split('/').length - 1].split('?')[0];
                if (data.message['sender_id'] == participantID) {
                    $('#typing-div').remove();
                    if (data.imgURL !== null) {
                        $('#chat-container').append(getImageHTML(false, data.img['id'], data.imgURL, 25, data.img['height'], data.img['width'], data.timestamp, data.message['created_at']));
                    } else {
                        $('#chat-container').append(getMessageHTML(false, data.message['message'], data.timestamp, data.message['created_at']));
                    }
                    fixTimeStamps();
                    $('div .content').animate({
                        scrollTop: $('#chat-container').get(0).scrollHeight
                    }, 1000);
                }
            }
        });

        var typingChannel = pusher.subscribe('Chat.Typing.{{ Auth::user()->id }}');

        // This function is called when a chat message has been received (We want this on the layout) (the full Laravel class)
        typingChannel.bind('App\\Events\\BroadcastTyping', function (data) {
            if (window.location.href.includes('/chat/open')) {
                var participantID = window.location.href.split('/')[window.location.href.split('/').length - 1].split('?')[0];
                if (data.sender_id == participantID) {
                    var html = `
              		<div class="message" id="typing-div">
                        <img class="avatar-md" src="${participantAvatar}" data-toggle="tooltip" data-placement="top" title="" alt="avatar" data-original-title="Username">
                        <div class="text-main">
                            <div class="text-group">
                                <div class="text typing">
                                    <div class="wave">
                                        <span class="dot"></span>
                                        <span class="dot"></span>
                                        <span class="dot"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                    if (data.is_typing == 'true') {
                        $('#chat-container').append(html);
                    } else {
                        $('#typing-div').remove();
                    }

                    $('div .content').animate({
                        scrollTop: $('#chat-container').get(0).scrollHeight
                    }, 1000);

                }
            }
        });

        // Subscribe to the channel we specified in our Laravel Event
        var purchaseChannel = pusher.subscribe('Credits.Purchased.{{ Auth::user()->id }}');

        // This function is called when a chat message has been received (We want this on the layout) (the full Laravel class)
        purchaseChannel.bind('App\\Events\\BroadcastPurchasedCredits', function (data) {
            Toast.fire({
                type: 'success',
                title: data.message
            });
            paypalCreditsPopupWindow.close();
            paypalCreditsPopupWindow = null;
            $('#credits-balance-popup').text(data.balance);
            $('#creditsModal').modal('hide');
        });

        $(document).on('submit', '#create-chat-popup', function (e) {
            e.preventDefault();

            var modelDiv = $("#recipient");
            if (modelDiv === undefined) {
                Toast.fire({
                    type: 'error',
                    title: 'Please select a model'
                });
                return;
            }


            var modelid = $('#model-chat-id').val() ? $('#model-chat-id').val().trim() : modelDiv.attr('data-id');
            
            // if (!Number.isInteger(modelid)) {
            //     Toast.fire({
            //         type: 'error',
            //         title: 'Could not find model'
            //     });
            //     return;
            // }

            var message = $('#chat-message').val();

            if (message.trim() === '') {
                Toast.fire({
                    type: 'error',
                    title: 'There is no message.'
                });
                return;
            }

            sendMessage(modelid, message);
            // reset the chat box to start a new chat
            $('#participant').prop('disabled', false);
            $('#participant').val('');
            $('#recipient').hide();
            $('#chat-message').val('');
            $('#create-chat-popup button').prop('disabled', false);
            // close the chat box
            document.getElementById('close-chat-button').click();
        });

        $(document).on('submit', '#form-reply-chat', function (e) {
            e.preventDefault();
            var participantID = window.location.href.split('/')[window.location.href.split('/').length - 1].split('?')[0];
            sendMessage(participantID, $('#form-reply-chat textarea').val());
            $('#form-reply-chat textarea').val('');
        });

        $('#chat-response-box').on('keyup keydown', function (event) {
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if (keycode == '13' && !event.shiftKey) {
                var participantID = window.location.href.split('/')[window.location.href.split('/').length - 1].split('?')[0];
                sendMessage(participantID, $('#form-reply-chat textarea').val());
                $('#form-reply-chat textarea').val('');
            }

        });

        $(document).ready(function () {
            // fixes new line spaces
            $('#chat-container').find('.message').each(function () {
                var msgNewLineFix = $(this).find('p').text().replace(/\n/g, "<br />");
                $(this).find('p').html(msgNewLineFix);
            });

            if (window.location.href.includes('open')) {
                fixTimeStamps();

                $('div .content').animate({
                    scrollTop: $('#chat-container').get(0).scrollHeight
                }, 1);
            }
        });



        function sendMessage(receiver, message) {
            var hasImg = document.getElementById("msg-img-input") !== null && document.getElementById("msg-img-input").files.length != 0;

            // TODO: They could easily manipulate the participantID and it would be really fucked if it sent to someone else

            if (hasImg) {
                var formData = new FormData();
                formData.append('file', document.getElementById("msg-img-input").files[0]);
                var participantID = window.location.href.split('/')[window.location.href.split('/').length - 1].split('?')[0];
                formData.append('receiver', participantID);
                $.ajax({
                    url: '/send_img',
                    data: formData,
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    async: false,
                    processData: false,
                    contentType: false,
                }).done(function (msg) {
                    // TODO: Get image popup to show when clicking newly appended images
                    $('#chat-container').append(getImageHTML(true, msg['img-id'], msg['img-url'], 25, msg['img-height'], msg['img-width'], msg['timestamp'], msg['created_at']));
                    fixTimeStamps();
                    $('div .content').animate({
                        scrollTop: $('#chat-container').get(0).scrollHeight
                    }, 1000);

                    $('#msg-img-input').val('')

                    ajaxSendChat(receiver, message);
                    $('#sendButton').attr('disabled', false)
                });
            } else {
                ajaxSendChat(receiver, message);
                $('#sendButton').attr('disabled', false)
            }
        }

        function ajaxSendChat(receiver, message) {
            $.ajax({
                url: '/send_msg',
                type: 'GET',
                dataType: 'json',
                data: {
                    receiver: receiver,
                    message: message,
                    _token: token
                },
            }).done(function (msg) {
                if (msg['success']) {
                    if (!window.location.href.includes('open')) {
                        window.location.href = msg['url'];
                    } else {
                        $('#chat-container').append(getMessageHTML(true, msg['message'], msg['timestamp'], msg['created_at']));
                        fixTimeStamps();
                        $('div .content').animate({
                            scrollTop: $('#chat-container').get(0).scrollHeight
                        }, 1000);
                        $('#credits-balance').text(msg['credits']);
                        $('#credits-balance-popup').text(msg['credits']);

                        var rate = parseInt($('#model-rate').text());

                        if (parseInt(msg['credits']) < rate) {
                            $('#chat-response-box').prop('readonly', true);
                            $('#credits-needed-alert').removeClass('hidden');
                            $('#credits-needed-alert').find('span').text(rate - parseInt(msg['credits']));
                        } else {
                            $('#credits-needed-alert').addClass('hidden');
                        }

                        
                    }
                } else {
                    Toast.fire({
                        type: 'error',
                        title: msg['msg'],
                    });
                }
            });
        }

        function fixTimeStamps() {
            var timestamp = "";
            var previousSpan = null;
            var i = 0;

            // first we need to clear out any printed visual timestamps
            $('#chat-container').find('.message').each(function () {
                var span = $(this).find('span');
                span.text('');
            });

            // first we need to clear out any dates
            $('#chat-container').find('.date').each(function () {
                $(this).remove();
            });

            // find the size of all the messages
            var messagesSize = $('#chat-container').find('.message').length;
            var diffDaysImplemented = [];

            // go through all messages to start appending date
            $('#chat-container').find('.message').each(function () {
                var span = $(this).find('span');

                if(span == undefined || span.attr('data-datestamp') == undefined) return;

                // we have to do all this bullshit to make sure the date can be parsed to a Date object
                var date = new Date(span.attr('data-datestamp').replace(' ', 'T') + 'Z');
                // use our function get the difference in days
                var diffDays = getDiffDays(date, new Date());

                // if the diffDays doesn't equal 0 or we haven't actually implemented this specific difference in days we can append it
                if (!diffDaysImplemented.includes(diffDays)) {

                    var html = `
                            <div class="date">
                            <hr>
                            <span>` + (diffDays == 0 ? "Today" : diffDays == 1 ? "Yesterday" : getDateFormat(date)) + `</span>
                            <hr>
                            </div>
                        `;

                    // add this x amount in difference of days to the array
                    diffDaysImplemented.push(diffDays);

                    // if (previousSpan != null) {
                    //     previousSpan.parent().parent().before(html);
                    // } else {
                    span.parent().parent().before(html);
                    // }
                }

                previousSpan = span;
            });

            // go through each message
            $('#chat-container').find('.message').each(function () {
                var span = $(this).find('span');
                var thisTimestamp = span.attr('data-timestamp');

                // check if it's the first message, if the timestamp is different than the last, or if it's the last message
                if (i === 0 || timestamp !== thisTimestamp || i === messagesSize - 1) {
                    // if it's the last message we need to append the timestamp
                    if (i === messagesSize - 1) {
                        if (span != null)
                            span.text(thisTimestamp);
                        // if this timestamp is different than the last update the previous span to display the previous timestamp
                        if (thisTimestamp !== timestamp) {
                            if (previousSpan != null)
                                previousSpan.text(timestamp);
                        }

                    }
                    // if i != 0 and the previous timestamp is different than this one update the previous one
                    else if (i !== 0) {
                        if (previousSpan != null)
                            previousSpan.text(timestamp);
                    }
                    timestamp = thisTimestamp;
                }

                if (i > 0) previousSpan = span;

                i++;
            });
        }

        function getDiffDays(date1, date2) {
            var oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds

            date1.setHours(0);
            date2.setHours(0);
            date1.setMinutes(0);
            date2.setMinutes(0);
            date1.setSeconds(0);
            date2.setSeconds(0);

            return Math.round(Math.abs((date1.getTime() - date2.getTime()) / (oneDay)));
        }

        function getDateFormat(dateObj) {
            var dateData = dateObj.toString().split(' ');
            return dateData[0] + ' ' + dateData[1] + ' ' + dateData[2] + ' ' + dateData[3];
        }
    </script>

    <script>
        if (window.location.href.includes('chat')) {
            var textInput = document.getElementById('chat-response-box');

            // Init a timeout variable to be used below
            var timeout = null;

            if (textInput !== null) {
                // Listen for keystroke events
                textInput.onkeyup = function (e) {

                    if (timeout == null) {
                        sendTypingStatus(true);
                    }

                    // Clear the timeout if it has already been set.
                    // This will prevent the previous task from executing
                    // if it has been less than <MILLISECONDS>
                    clearTimeout(timeout);

                    // Make a new timeout set to go off in 800ms
                    timeout = setTimeout(function () {
                        sendTypingStatus(false);
                        timeout = null;
                    }, 3000);
                };
            }
        }

        function sendTypingStatus(value) {
            var participantID = window.location.href.split('/')[window.location.href.split('/').length - 1].split('?')[0];
            $.ajax({
                url: '/typing',
                type: 'GET',
                dataType: 'json',
                data: {
                    receiver: participantID,
                    typing: value,
                    _token: token
                },
            });
        }
    </script>

    <script>
        if (window.location.href.includes('/chat/open')) {
            var page = 1;
            var scrollBox = document.getElementById('content');

            scrollBox.onscroll = function () {
                if (scrollBox.scrollTop == 0) {
                    grabOldMessages();
                }
            };
        }

        function grabOldMessages() {
            var user_id = '{{ Auth::user()->id }}';
            var participantID = window.location.href.split('/')[window.location.href.split('/').length - 1].split('?')[0];
            $.ajax({
                url: '/chat/get/' + participantID + '/' + page,
                type: 'GET',
                dataType: 'json',
                data: {
                    _token: token
                },
            }).done(function (msg) {
                // if there are no messages return
                if (msg['messages'].length < 1) return;
                // the html template for the participants message
                // the total HTML after all the divs of messages are made
                var totalHTML = '';
                msg['messages'].forEach(function (message) {
                    totalHTML += getMessageHTML(message['sender_id'] == user_id, message['message'], message['timestamp'], message['created_at']);
                });

                // get the scroll height of the messages before appending new messages
                var el = document.getElementById('content');
                var lastScrollHeight = el.scrollHeight;
                // append new messages
                $('#chat-container').prepend(totalHTML);
                fixTimeStamps();
                // get the difference of the height of the messages after appending the new ones (essentially the height of the new messages)
                var scrollDiff = el.scrollHeight - lastScrollHeight;
                // adjust the window to scroll that difference
                $('div .content').animate({
                    scrollTop: scrollDiff
                }, 1);
                page++;
            });
        }
    </script>

    <script>
        var paypalCreditsPopupWindow = null;
        $(document).ready(function () {

            $('#chat-response-box').on('click', function (e) {
                e.preventDefault();
                if ($(this).attr('readonly')) {
                    $('#creditsModal').modal('show');
                }
            });

            $('#credits-options button').on('click', function (e) {
                e.preventDefault();
                var amount = 0;
                if(e.target.nodeName == 'BUTTON') {
                   amount = parseInt($(e.target).attr('data-amount'));
                } else if (e.target.nodeName == 'DIV') {
                   amount = parseInt($(e.target).parent().attr('data-amount'));
                } else if (e.target.nodeName == 'I') {
                    amount = parseInt($(e.target).parent().parent().parent().attr('data-amount'));
                }

                $.ajax({
                    url: '/paypal/create-credit-checkout/' + amount,
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    data: {
                        _token: token
                    },
                }).done(function (msg) {
                    paypalCreditsPopupWindow = PopupCenter(msg['url'], 'PayPal Checkout', 480, 640);
                });
            });
        });

        function PopupCenter(url, title, w, h) {
            // Fixes dual-screen position                         Most browsers      Firefox
            var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : window.screenX;
            var dualScreenTop = window.screenTop != undefined ? window.screenTop : window.screenY;

            var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
            var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

            var systemZoom = width / window.screen.availWidth;
            var left = (width - w) / 2 / systemZoom + dualScreenLeft
            var top = (height - h) / 2 / systemZoom + dualScreenTop
            var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w / systemZoom + ', height=' + h / systemZoom + ', top=' + top + ', left=' + left);

            // Puts focus on the newWindow
            if (window.focus) newWindow.focus();
            return newWindow;
        }

        function chatSelectImage() {
            $('#msg-img-form input').trigger("click");
        }
    </script>
@endauth