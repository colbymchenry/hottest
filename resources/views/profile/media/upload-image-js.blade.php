<script>
    function imageSubmit() {
        document.getElementById("image_input").click();
    }

    function submitImage() {
        var imgType = $('#upload-image-type').find('.active').find('input').prop('name');
        $('#upload-img-type').prop('value', imgType);
        var imgDesc = $('#upload-image-description').val();
        $('#upload-img-description').prop('value', imgDesc);
        var imgTags = $('#upload-image-tags').val();
        $('#upload-img-tags').prop('value', imgTags);

        if($('#image_input').val() === '') {
            Swal.fire({
                type: 'error',
                title: 'You must select an image.',
            });
            return;
        }

        document.getElementById("image_form").submit();
        $("#upload-image-btn").prop('disabled', true);
    }

    document.getElementById("image_input").onchange = function () {
        var file = this.files[0];
        var reader = new FileReader();
        reader.onloadend = function () {
            $('#model-upload-prev').css('background-image', 'url("' + reader.result + '")');
        };

        if (file) {
            reader.readAsDataURL(file);
            var _URL = window.URL || window.webkitURL;
            var img = new Image();
            img.onload = function () {
                //alert(this.width + " " + this.height);
                var ratio = this.height / this.width;

                if (ratio < (8 / 10)) {
                            //var hratio = ratio * 840;
                            //var wratio = ratio * 1320;
                            //$(".height-upload").css("padding-top", 560);
                            //$(".url-upload").css("height", 560);
                            //$(".width-upload").css("max-width", 880);
                            $('#imgUpload').removeClass('portrait');
                            $('#model-upload-prev').removeClass('portrait');
                            $('#width-upload').removeClass('portrait');
                            $('#uploadMain').addClass('landscape');
                            $('#model-upload-prev').addClass('landscape');
                            $('#width-upload').addClass('landscape');
                            $('.square-btn').removeClass('active');  
                            $('.portrait-btn').removeClass('active');                                                    
                            $('.landscape-btn').addClass('active');
                        } else if (ratio > (8 / 10) && ratio < (12 / 10)) {
                            //var h2ratio = ratio * 700;
                            //var w2ratio = ratio * 700;
                            //$(".height-upload").css("padding-top", 700);
                            //$(".url-upload").css("height", 700);
                            //$(".width-upload").css("max-width", 700);
                            $('#uploadMain').removeClass('landscape');
                            $('#model-upload-prev').removeClass('landscape');
                            $('#width-upload').removeClass('landscape');
                            $('#uploadMain').removeClass('portrait');
                            $('#model-upload-prev').removeClass('portrait');
                            $('#width-upload').removeClass('portrait');
                            $('.landscape-btn').removeClass('active');
                            $('.portrait-btn').removeClass('active');
                            $('.square-btn').addClass('active');
                        } else {
                            //var h3ratio = (ratio - 1) * 1100;
                            //var w3ratio = (ratio - 1) * 700;
                            //$(".height-upload").css("padding-top", 750);
                            //$(".url-upload").css("height", 750);
                            //$(".width-upload").css("max-width", 560);
                            $('#uploadMain').removeClass('landscape');
                            $('#model-upload-prev').removeClass('landscape');
                            $('#width-upload').removeClass('landscape');
                            $('#uploadMain').addClass('portrait');
                            $('#model-upload-prev').addClass('portrait');
                            $('#width-upload').addClass('portrait');
                            $('.square-btn').removeClass('active');                             
                            $('.landscape-btn').removeClass('active');                           
                            $('.portrait-btn').addClass('active');
                        }


                // if ( ratio < (8/10) ) { 
                //     //var hratio = ratio * 840;
                //     //var wratio = ratio * 1320;
                //     $(".upload-image").css("padding-top", 560); 
                //     $(".modal-img").css("height", 560);                   
                //     $(".modal.show .modal-dialog").css("max-width", 880); 
                // } else if ( ratio > (8/10) && ratio < (12/10) ) { 
                //     //var h2ratio = ratio * 700;
                //     //var w2ratio = ratio * 700;
                //     $(".upload-image").css("padding-top", 700); 
                //     $(".modal-img").css("height", 700);                   
                //     $(".modal.show .modal-dialog").css("max-width", 700);                    
                // } else {
                //     //var h3ratio = (ratio - 1) * 1100;
                //     //var w3ratio = (ratio - 1) * 700;
                //     $(".upload-image").css("padding-top", 750); 
                //     $(".modal-img").css("height", 750);                   
                //     $(".modal.show .modal-dialog").css("max-width", 560);                 
                // }
                // //$(".upload-image").css("padding-top", this.height); 
                // //$(".modal-img").css("height", this.height); 
                // if (this.width > this.height){
                //     //it's a landscape
                // } else if (this.width < this.height){
                //     //it's a portrait
                // } else {
                //     //image width and height are equal, therefore it is square.
                // }

            };
            img.src = _URL.createObjectURL(file);
        } else {
        }

        $('#model-upload-prev-overlay').removeClass('box-hover');
    };

    $(document).ready(function () {

        $('#upload-img-btn').on('click', function (e) {
            $('#model-upload-prev').css('background-image', 'url("")');
            $('#model-upload-prev-overlay').removeClass('box-hover');
            $('#model-upload-prev-overlay').addClass('box-hover');
            $("#upload-image-btn").prop('disabled', false);
        });


        $(".portrait-btn").on("click", function () {
            $('#uploadMain').removeClass('landscape');
            $('#model-upload-prev').removeClass('landscape');
            $('#width-upload').removeClass('landscape');
            $('#uploadMain').addClass('portrait');
            $('#model-upload-prev').addClass('portrait');
            $('#width-upload').addClass('portrait');
        });
        $(".landscape-btn").on("click", function () {
            $('#uploadMain').removeClass('portrait');
            $('#model-upload-prev').removeClass('portrait');
            $('#width-upload').removeClass('portrait');
            $('#uploadMain').addClass('landscape');
            $('#model-upload-prev').addClass('landscape');
            $('#width-upload').addClass('landscape');
        });
        $(".square-btn").on("click", function () {
            $('#uploadMain').removeClass('portrait');
            $('#model-upload-prev').removeClass('portrait');
            $('#uploadMain').removeClass('landscape');
            $('#model-upload-prev').removeClass('landscape');
            $('#width-upload').removeClass('portrait');
        });

    });
  
    
    function rotateImage(degree) {
            $('.modal-img').animate({  transform: degree }, {
            step: function(now,fx) {
                $(this).css({
                    '-webkit-transform':'rotate('+now+'deg)', 
                    '-moz-transform':'rotate('+now+'deg)',
                    'transform':'rotate('+now+'deg)'
                });
            }
            });
        }

</script>