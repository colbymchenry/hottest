<script>
    var modelSearchResults = [];

    function emptySearchResultsAndReset() {
        modelSearchResults = [];
        updateMessageSearch([]);
        $('#recipient-results').parent().hide();
    }

    function searchForModel(name) {
        // if the user has nothing inputted in the search field we must empty and reset
        if (name === '') {
            emptySearchResultsAndReset();
            return;
        }

        /**
         * Send an ajax request to find models with a similar name
         */
        $.ajax({
            url: '/search_for_model/' + name,
            type: 'GET',
            dataType: 'json',
            data: {
                _token: token
            },
        }).done(function (msg) {
            // if there is no models with a similar name we must empty and reset
            if(msg.length < 1) {
                emptySearchResultsAndReset();
            } else {
                // we have to reverse the array or else it won't show the most common name first
                updateMessageSearch(msg.reverse());
                modelSearchResults = msg;
            }
        });
    }

    var typingTimer;
    var doneTypingInterval = 300;

    //TODO: Add all the model inputs here for autosearching
    var $input = $('#participant');

    //on keyup, start the countdown
    $input.on('keyup', function () {
        clearTimeout(typingTimer);
        typingTimer = setTimeout(doneTyping, doneTypingInterval);
    });

    //on keydown, clear the countdown
    $input.on('keydown', function () {
        clearTimeout(typingTimer);
    });

    //user is "finished typing," do something
    function doneTyping() {
        searchForModel($input.val());
    }

    // Done: Robert... I need you to make CSS classes for all of this generated code so it can be cleaned up 
    function updateMessageSearch(models) {
        var html = '\
            <div class="container list">\
                <div class="user" id="search-recipient-modelid">\
                <img class="avatar-sm" src="avatar-img" alt="avatar">\
                <h5 class="noselect">modelname</h5>\
                </div>\
            </div>\
        ';

        // empty the results popup and show it
        $('#recipient-results').empty();
        $('#recipient-results').parent().show();
        // append all the model results
        models.forEach(function (model) {
            $('#recipient-results').prepend(html.replace('modelid', model['id']).replace('modelname', model['name']).replace('avatar-img', model['avatar']));
        });
    }

    $(document).on('click', "div[id^=search-recipient-]", function(e) {
        var modelid = $(this).prop('id').replace('search-recipient-', '');

        var model = [];

        // find what model they clicked by matching the id with one in the search results array
        for (let m of modelSearchResults) {
            if(m['id'] == modelid) {
                model = m;
                break;
            }
        }

        var html = '\
        <div class="user noselect" id="recipient" data-id="' + modelid + '">\
            <img class="avatar-sm" src="' + model['avatar'] + '" alt="avatar">\
                <h5>' + model['name'] + '</h5>\
            <button class="btn"><i class="material-icons">close</i></button>\
        </div>\
        ';

        // add the model to the input box and empty the array/reset everything
        $('#participant').after(html);
        $('#recipient-results').parent().hide();
        modelSearchResults = [];
        $('#participant').prop('disabled', true);
    });

    // this is used to delete the model div inside the input field
    $(document).on('click', "#recipient button", function(e) {
        $(this).parent().remove();
        $('#participant').val('');
        $('#participant').prop('disabled', false);
    });

    // handle closing the search result list if clicking outside of it
    $(document).mouseup(function(e)
    {
        var container = $('#recipient-results').parent();

        // if the target of the click isn't the container nor a descendant of the container
        if (!container.is(e.target) && container.has(e.target).length === 0)
        {
            container.hide();
            modelSearchResults = [];
        }
    });

</script>

