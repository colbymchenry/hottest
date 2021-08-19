<script>
    var xyxTags = [];
    var xyxRemovedTags = [];

    function editImage() {
        var jsSelector = document.getElementById('imgMain');
        var id = $(jsSelector).attr('data-imgdataido').replace('img', '').replace('t', '');
        var imgType = $('#edit-image-type').find("label.active").attr('data-type');
        var description = $('#edit-image-description').val();
        var tags = '';

        for(var i = 0; i < xyxTags.length; i++) {
            tags += xyxTags[i] + ',';
        }

        $('div.tagsinput').children('span').each(function(index, value) {
            var tag = $(value).text();
            if(!xyxTags.includes(tag) && !xyxRemovedTags.includes(tag)) {
                tags += tag + ',';
            }
        });

        $('#viewImageModal').modal('toggle');

        $.ajax({
            url: '/model/edit_image',
            type: 'GET',
            dataType: 'json',
            data: {
                description: description,
                tags: tags,
                type: imgType,
                imgID: id
            }
        }).done(function (msg) {
            Toast.fire({
                type: msg['success'] ? 'success' : 'error',
                title: msg['msg']
            });

            if (msg['success']) {
                var mainDiv = $('#img' + id + "t");
                mainDiv.removeClass('public');
                mainDiv.removeClass('vip');
                mainDiv.removeClass('unlisted');
                mainDiv.addClass(imgType);

                var imageDiv = $('#img' + id);
                imageDiv.data('description', description);
                imageDiv.data('tags', tags);
            }

        });
    }

    function deleteImage() {
        var id = $('#imgMain').attr('data-imgdataido').replace('img', '').replace('t', '');
        alert(id);

        $('#viewImageModal').modal('toggle');

        $.ajax({
            url: '/model/delete_image',
            type: 'GET',
            dataType: 'json',
            data: {
                imgID: id
            }
        }).done(function (msg) {
            Toast.fire({
                type: msg['success'] ? 'success' : 'error',
                title: msg['msg']
            });
            // $('#img' + id + 't').remove();
            $grid.isotope('remove', $('#img' + id + 't')).isotope('layout');
        });
    }

    function fillEditData() {
        var id = $('div.flame-it-modal').prop('id').replace('img', '').replace('tk', '');
        var imageDiv = $('#img' + id);
        var description = imageDiv.attr('data-description');
        var tags = imageDiv.attr('data-tags');

        $('#edit-image-description').val(description);
        $('span.tag.label').remove();
        if (tags.includes(',')) {
            addTagToEditField(tags.split(','));
        }

        $('#edit-image-tags').val(tags);
    }

    function addTagToEditField(tags) {
        xyxTags = [];
        var i = 1;
        tags.forEach(function (elem) {
            if(elem !== '') {
                $('div.tagsinput').prepend('<span class="tag label label-primary">' + elem + '<span data-role="remove"></span></span>');
                i++;
                xyxTags.push(elem);
            }
        });
    }


</script>

<script>
    $(document).ready(function () {
        $("div.tagsinput").on('click', function (e) {
            if (e.target.nodeName === 'SPAN') {
                if ($(e.target).attr('data-role') === 'remove') {
                    $(e.target).parent().remove();
                    xyxRemovedTags.push($(e.target).parent().text());
                    xyxTags = arrayRemove(xyxTags, $(e.target).parent().text());
                }
            }
        });
    });

    function arrayRemove(arr, value) {
        return arr.filter(function(ele){
            console.log(ele + ',' + value);
            return ele != value;
        });
    }
</script>