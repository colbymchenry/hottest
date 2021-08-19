var tapped = false;
var touchmoved;
$(".modal-ui-trigger").on("click touchend", function (e) {
    var $id = $(this).attr("id");
    var selector = document.getElementById($id);
    var $el = $(selector);

    var $imgid = $el.data('idt');
    var $selectortt = $imgid

    var $imgheight = $el.data('height');
    var $imgwidth = $el.data('width');

    var $imgurl = $el.data('url');
    $(".url-open").css("background-image", "url(" + $imgurl + ")");

    var $imgmodel = $el.data('model');
    $(".model-open").html($imgmodel);
    var $imgdescription = $el.data('description');
    $(".description-open").html($imgdescription);
    var $imgtime = $el.data('time');
    $(".time-open").html($imgtime);

    var ratio = $imgheight / $imgwidth;
    if (ratio < (8 / 10)) {
        //var hratio = ratio * 840;
        //var wratio = ratio * 1320;
        //$(".height-open").css("padding-top", 560);
        //$(".url-open").css("height", 560);
        //$(".width-open").css("max-width", 880);
        $('#imgMain').removeClass('portrait');
        $('#url-open').removeClass('portrait');
        $('#width-open').removeClass('portrait');
        $('#imgMain').addClass('landscape');
        $('#url-open').addClass('landscape');
        $('#width-open').addClass('landscape');
    } else if (ratio > (8 / 10) && ratio < (12 / 10)) {
        //var h2ratio = ratio * 700;
        //var w2ratio = ratio * 700;
        //$(".height-open").css("padding-top", 700);
        //$(".url-open").css("height", 700);
        //$(".width-open").css("max-width", 700);
        $('#imgMain').removeClass('landscape');
        $('#url-open').removeClass('landscape');
        $('#width-open').removeClass('landscape');
        $('#imgMain').removeClass('portrait');
        $('#url-open').removeClass('portrait');
        $('#width-open').removeClass('portrait');
    } else {
        //var h3ratio = (ratio - 1) * 1100;
        //var w3ratio = (ratio - 1) * 700;
        //$(".height-open").css("padding-top", 750);
        //$(".url-open").css("height", 750);
        //$(".width-open").css("max-width", 560);
        $('#imgMain').removeClass('landscape');
        $('#url-open').removeClass('landscape');
        $('#width-open').removeClass('landscape');
        $('#imgMain').addClass('portrait');
        $('#url-open').addClass('portrait');
        $('#width-open').addClass('portrait');
    }
    if ($('#' + $imgid).hasClass('liked')) {
        $('#imgMain').parent().addClass('liked');
    } else {
        $('#imgMain').parent().removeClass('liked');
    }

    if (!tapped && !touchmoved) { //if tap is not set, set up single tap
        tapped = setTimeout(function () {
            tapped = null

            if($el.data('vip') === 0 || ($el.data('vip') === 1 && $el.data('access'))) {
                $('#viewImageModal').modal('toggle');
            }

            $('#viewImageModal').on('shown.bs.modal', function () {
                //var $el = $("#img8");
                //$(".width-open").css("width", $imgwidth);
                //var $imgheight = $el.data('height');
                //$(".height-open").css("padding-top", $imgheight);

                var $imgdataid = $el.data('idt');
                var $imgMain = "imgMain" + $imgdataid
                $('.modal-ui-open').attr('id', $imgMain);
                $('.modal-uio-trigger').attr('data-imgdataido', $imgdataid);
                var $imgdataidk = $imgdataid + "k";
                $('.flame-it-modal').attr('id', $imgdataidk);
                $('.flame-it-modal').attr('data-idd', $imgdataid);

                // add all the tags
                $('div.field div.tags').empty();
                if($el.data('tags')) {
                    addTagsToImage($el.data('tags').split(','));
                }
                //$('.modal-uio-trigger').attr('id', $imgdataido);
            });

            function addTagsToImage(tags) {
                var i = 1;

                tags.forEach(function(elem) {
                    $('div.field div.tags').prepend('<span class="badge badge-primary">' + elem + '</span>');
                    i++;
                });
            }

            $('#viewImageModal').on('hidden.bs.modal', function () {
                //var $el = $("#img8");
                var $imgurl = $el.data('url');
                $('.tab-imgedit').hide();
                $('.tab-imgview').show();
                $(".url-open").css("background-image", "url()");
                // var $imgheight = $el.data('height');
                // $(".height-open").css("padding-top", 500);
                $('#imgMain').removeClass('landscape');
                $('#url-open').removeClass('landscape');
                $('#width-open').removeClass('landscape');
                $('#imgMain').removeClass('portrait');
                $('#url-open').removeClass('portrait');
                $('#width-open').removeClass('portrait');
            });

        }, 300);   //wait 300ms then run single click code
    } else if (!touchmoved) {    //tapped within 300ms of last tap. double tap
        clearTimeout(tapped); //stop single tap callback
        tapped = null

        $("#" + $selectortt).toggleClass('liked');
        var $imgMainO = "imgMain" + $selectortt;
        $("#" + $imgMainO).toggleClass('liked');
        likeImage($imgid);
    }
    e.preventDefault()
}).on('touchmove', function(e){
    touchmoved = true;
}).on('touchstart', function(){
    touchmoved = false;
});
$(".flame-it").on("click", function (e) {
    var $idt = $(this).attr("id");
    var selectort = document.getElementById($idt);
    var $elt = $(selectort);
    var $imgidt = $elt.data('idd');
    var $imgMainO = "imgMain" + $imgidt;
    $("#" + $imgidt).toggleClass('liked');
    $("#" + $imgMainO).toggleClass('liked');
    likeImage($imgidt);
});
$(".flame-it-modal").on("click", function (e) {
    var $idt = $(this).attr("id");
    var selectort = document.getElementById($idt);
    var $elt = $(selectort);
    var $imgidt = $elt.data('idd');
    var $imgIDMain = "imgMain" + $imgidt;
    $("#" + $imgidt).toggleClass('liked');
    $("#" + $imgIDMain).toggleClass('liked');
    likeImage($imgidt);
});

var tapped = false;
var touchmoved;
$(".modal-uio-trigger").on("click touchend", function (e) {
    var $id = $(this).attr("id");
    var selectoro = document.getElementById($id);
    var $elo = $(selectoro);
    var $imgido = $elo.data('imgdataido');
    var $imgIDMain = "imgMain" + $imgido;
    if (!tapped && !touchmoved) { //if tap is not set, set up single tap
        tapped = setTimeout(function () {
            tapped = null

            $('#viewImageModal').modal('hide');

        }, 300);   //wait 300ms then run single click code
    } else if (!touchmoved){    //tapped within 300ms of last tap. double tap
        clearTimeout(tapped); //stop single tap callback
        tapped = null

        $("#" + $imgido).toggleClass('liked');
        $("#" + $imgIDMain).toggleClass('liked');
        likeImage($imgido);
    }
    e.preventDefault()
    }).on('touchmove', function(e){
        touchmoved = true;
    }).on('touchstart', function(){
        touchmoved = false;
});


$('.tab-settings').hide();
$('#editsettingsref, #closeedit').on('click', function () {
    $('.tab-profile, .tab-settings').toggle();
});
$('.tab-imgedit').hide();
$('.edit-img').on('click', function () {
    $('.tab-imgview, .tab-imgedit').toggle();
    fillEditData();
});

$("#snapchatPublic-btn").on("click touchstart", function () {
    document.getElementById('snapchat-add-username').style.display = 'block';
    document.getElementById('snapchat-add-cost').style.display = 'none';
    $( "#SnapChatButton" ).removeClass( "disabled" )
    $( "#SnapChatButton" ).removeClass( "bg-private" )    
    $( "#SnapChatButton" ).addClass( "bg-public" )   
    $( "#snp-add" ).addClass( "hidden" )
    $( "#snp-cost" ).addClass( "hidden" )
});
$("#snapchatPrivate-btn").on("click touchstart", function () {
    document.getElementById('snapchat-add-username').style.display = 'none';
    document.getElementById('snapchat-add-cost').style.display = 'block';
    $( "#SnapChatButton" ).removeClass( "disabled" )
    $( "#SnapChatButton" ).removeClass( "bg-public" )    
    $( "#SnapChatButton" ).addClass( "bg-private" )   
    $( "#snp-add" ).addClass( "hidden" )
    $( "#snp-cost" ).removeClass( "hidden" )
});
$("#snapchatUnlisted-btn").on("click touchstart", function () {
    document.getElementById('snapchat-add-username').style.display = 'none';
    document.getElementById('snapchat-add-cost').style.display = 'none';
    $( "#SnapChatButton" ).removeClass( "bg-private" )
    $( "#SnapChatButton" ).removeClass( "bg-public" )   
    $( "#SnapChatButton" ).addClass( "disabled" )
    $( "#snp-add" ).removeClass( "hidden" )
    $( "#snp-cost" ).addClass( "hidden" )
});
$("#messagePublic-btn").on("click touchstart", function () {
    document.getElementById('message-cost').style.display = 'none';
    document.getElementById('message-open').style.display = 'block';
    $( "#MessageButton" ).removeClass( "disabled" )
    $( "#MessageButton" ).removeClass( "bg-private" )    
    $( "#MessageButton" ).addClass( "bg-public" )
    $( "#msg-add" ).addClass( "hidden" )
    $( "#msg-cost" ).addClass( "hidden" )
});
$("#messagePrivate-btn").on("click touchstart", function () {
    document.getElementById('message-open').style.display = 'none';
    document.getElementById('message-cost').style.display = 'block';
    $( "#MessageButton" ).removeClass( "disabled" )
    $( "#MessageButton" ).removeClass( "bg-public" )    
    $( "#MessageButton" ).addClass( "bg-private" ) 
    $( "#msg-add" ).addClass( "hidden" ) 
    $( "#msg-cost" ).removeClass( "hidden" ) 
});
$("#messageUnlisted-btn").on("click touchstart", function () {
    document.getElementById('message-open').style.display = 'none';
    document.getElementById('message-cost').style.display = 'none';
    $( "#MessageButton" ).removeClass( "bg-private" )
    $( "#MessageButton" ).removeClass( "bg-public" )   
    $( "#MessageButton" ).addClass( "disabled" )
    $( "#msg-add" ).removeClass( "hidden" )
    $( "#msg-cost" ).addClass( "hidden" )
});

    $('#sendButton').on("click touchstart", function () {
        var credit = $(this).data('credit');
        if (credit < 2){
            const tokensB =  document.querySelector('.tokens-button')
            tokensB.classList.add('animated', 'rubberBand')
            tokensB.addEventListener('animationend', function() { tokensB.classList.remove('animated', 'rubberBand') })
        }
    });

    $('#notifcationsTest').on("click touchstart", function () {
            const tokensB =  document.querySelector('.button-notifications')
            tokensB.classList.add('animated', 'tada')
            tokensB.addEventListener('animationend', function() { tokensB.classList.remove('animated', 'tada') })
    });


    $("#is-agent-btn").on("click touchstart", function () {
        document.getElementById('desc-is').innerHTML = "Manage and support a model page.";
        document.getElementById('title-is').innerHTML = "Agency name";
        document.getElementsByName('name')[0].placeholder='Agency Inc';
    });
    $("#is-model-btn").on("click touchstart", function () {
        document.getElementById('desc-is').innerHTML = "You can create a model account later.";
        document.getElementById('title-is').innerHTML = "Model name";        
        document.getElementsByName('name')[0].placeholder='Miss';
    });
    $("#is-user-btn").on("click touchstart", function () {
        document.getElementById('desc-is').innerHTML = "";
        document.getElementById('title-is').innerHTML = "User name";  
        document.getElementsByName('name')[0].placeholder='Username';     
    });

    $("#modelProfileButton").on("click touchstart", function () {
        setTimeout(function () {
        $( "#change-user-btn" ).removeClass( "active" )
        $( "#change-agent-btn" ).removeClass( "active" )
        $( "#change-model-btn" ).addClass( "active" )    
        document.getElementById('change-btn').innerHTML = "Create Model Profile";
        $( "#change-btn" ).removeClass( "disabled" )
    }, 550);
    });

    $("#change-agent-btn").on("click touchstart", function () {
        document.getElementById('change-btn').innerHTML = "Register as Agent";
        $( "#change-btn" ).removeClass( "disabled" ) 
    });
    $("#change-model-btn").on("click touchstart", function () {
        document.getElementById('change-btn').innerHTML = "Create Model Profile";
        $( "#change-btn" ).removeClass( "disabled" ) 
    });
    $("#change-user-btn").on("click touchstart", function () {
        //document.getElementById('change-btn').innerHTML = "Cancel";  
        $( "#change-btn" ).addClass( "disabled" ) 
    });


    