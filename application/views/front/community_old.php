<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/vendors/nefty_popup/dist/jquery.niftymodals.css" /> 
<script src="<?php echo base_url(); ?>/vendors/nefty_popup/dist/jquery.niftymodals.js"></script>
<script>
    $(document).ready(function () {
        var status = '<?php echo $_SESSION['login_msg']; ?>';
        if (status) {
            alert(status);
        }

        $('.views').on('focus', function () {
            var modal = $(this).data('modal');
            $("#" + modal).niftyModal();
        });
    });
</script> 
<script>
    // this is important for IEs
    var polyfilter_scriptpath = '<?php echo base_url(); ?>/vendors/nefty_popup/lib/js/';</script>

<script src="<?php echo base_url(); ?>/vendors/nefty_popup/lib/js/cssParser.js"></script>
<script src="<?php echo base_url(); ?>/vendors/nefty_popup/lib/js/css-filters-polyfill.js"></script>
<script src="<?php echo base_url() ?>front/js/build.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>front/js/public.js" type="text/javascript"></script>
<script>
    var Dropzone = require("enyo-dropzone");
    Dropzone.autoDiscover = false;</script>
<style>
    #actions{margin:0}
    div.table{display:table}
    div.table .file-row{display:table-row}
    div.table .file-row > div{display:table-cell;vertical-align:top;border-top:1px solid #ddd;padding:8px}
    div.table .file-row:nth-child(odd){background:#f9f9f9}
    #total-progress{opacity:0;transition:opacity .3s linear}
    #previews .file-row.dz-success .progress{opacity:0;transition:opacity .3s linear}
    #previews .file-row .delete{display:none}
    #previews .file-row.dz-success .start,#previews .file-row.dz-success .cancel{display:none}
    #previews .file-row.dz-success .delete{display:block}
</style>

<?php $imageUploadPath = UPLOADS . '/images'; ?>
<section>
    <div class="layout-row layout-xs-column">
        <div class="flex-50 flex-xs-100 layout-column video-section" style="overflow-y: auto">
            <div class="container">
                <div class="row">
                    <?php foreach ($songs_data as $song) { ?>
                        <div class="col-xs-12">
                            <div class="well">
                                <div style="height: 100%;width: 100%;overflow:auto;" class="video-section1">
                                    <div class="col-xs-6">
                                        <a href="<?php echo site_url('Video/index/') . $song['ID'] ?>">
                                            <img src="<?php echo base_url('uploads/images') . '/' . $song['Image'] ?>" class="album_image">
                                        </a>
                                    </div>
                                    <div class="col-xs-6">
                                        <b>Song Title</b>:<?php echo $song['Song_Title'] ?><br>
                                        <b>Composer:</b><?php echo $song['composer'] ?><br>
                                        <b>Director:</b><?php echo $song['director'] ?><br>
                                        <b>Writers:</b><?php echo $song['director'] ?><br>
                                        <b>Views:</b><?php echo $song['HITS'] ?><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="layout-column flex-50 flex-xs-100 public-section">
            <div class="layout-column comment-section" style="width:93%;">
                <textarea placeholder="Post Your Views Or Songs" data-modal="modal-12" class="views textarea-views"></textarea>
            </div>
            <div style="height: 100%;width: 100%;overflow-y: auto;" >
                <div id="public_wall">

                </div>
            </div>
        </div>

    </div>
</section>
<div class="md-container md-effect-12" id="modal-12">
    <div class="md-content">
        <!--<h3>Your</h3>-->
        <div class="drop_area" style="padding: 5px 7px 10px;">
            <form class="" action="" method="post" id="comment_post_form">
                <div class="form-group">
                    <textarea class="form-control" name="COMMENTS"></textarea>
                </div>
            </form>

            <div id="actions" class="row">

                <div class="col-lg-7">
                    <!-- The file input-button span is used to style the file input field as button -->
                    <span class="btn btn-success fileinput-button">
                        <i class="glyphicon glyphicon-plus"></i>
                        <span>Click To Add files Or Drop Your Files Here</span>
                    </span>
                </div>

                <div class="col-lg-5">
                    <!-- The global file processing state -->
                    <span class="fileupload-process">
                        <div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                            <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                        </div>
                    </span>
                </div>

            </div>
            <div class="table table-striped" class="files" id="previews">

                <div id="template" class="file-row">
                    <!-- This is used as the file preview template -->
                    <div>
                        <span class="preview"><img data-dz-thumbnail /></span>
                    </div>
                    <div>
                        <p class="name" data-dz-name></p>
                        <strong class="error text-danger" data-dz-errormessage></strong>
                    </div>
                    <div>
                        <p class="size" data-dz-size></p>
                        <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                            <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="    margin-top: -15px;">
                <div class="col-md-8">
                </div>
                <div class="col-md-4">
                    <div class="col-md-6">
                        <button class="md-close btn btn-danger">Cancel</button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-success comment_form_submit" disabled>Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var base_url = '<?php echo base_url() ?>';
    var site_url = '<?php echo site_url() ?>';
    var limit = 2;
    var offset = 0;
    var limit_ind = 4;
    var offset_ind = 0;
    var limit_song = 1;
    var offset_song = 0;

    $(document).ready(function () {
        $('.video-section').height($(window).height() - $('header').height());
        $('.public-section').height($(window).height() - $('header').height());
        $('.profile-section').height($(window).height() - $('header').height() - 20);
        get_post({'limit': limit, 'offset': offset, 'offset_song': offset_song});
//        get_post_industry({'limit': limit_ind, 'offset': offset_ind});
        $('.user_signup_switch').on('click', function () {
            $('.login_form').hide();
            $('.signup_form').show();
        });
        $('.user_login_switch').on('click', function () {
            $('.login_form').show();
            $('.signup_form').hide();
        });
        $('.user_login_button').on('click', function () {
            var error = 0;
            $('#login_form .required').each(function () {
                if ($(this).val() == '') {
                    error = 1;
                    $(this).css('border', '#ff0000 solid 1px');
                }
            });
            if (!error) {
                $('#login_form').submit();
            } else {
                return false;
            }
        });
        $('.user_signup_button').on('click', function () {
            var error = 0;
            $('#signup_form .required').each(function () {
                if ($(this).val() == '') {
                    error = 1;
                    $(this).css('background-color', '#ff0000 solid 1px');
                }
            });
            if (!error) {
                $('#signup_form').submit();
            } else {
                return false;
            }
        });
    });

</script>
<script>
    $(document).ready(function () {
        $(".album_image").each(function () {
            var width = $(this).width();
            var height = width * 9 / 16;
            if (width != 0 && height != 0) {
                $(this).attr('width', width);
                $(this).attr('height', height);
            }
        });
    });


    var previewNode = document.querySelector("#template");
    previewNode.id = "";
    var previewTemplate = previewNode.parentNode.innerHTML;
    previewNode.parentNode.removeChild(previewNode);
    var myDropzone = new Dropzone(".drop_area", {// Make the whole body a dropzone
        url: "<?php echo site_url('Index/uploadFiles') ?>", // Set the url
        thumbnailWidth: 80,
        thumbnailHeight: 80,
        parallelUploads: 20,
        previewTemplate: previewTemplate,
        autoQueue: true, // Make sure the files aren't queued until manually added
        previewsContainer: "#previews", // Define the container to display the previews
        clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
    });
    myDropzone.on("addedfile", function (file) {
        $('.comment_form_submit').prop('disabled', true);
        // Hookup the start button
    });
// Update the total progress bar
    myDropzone.on("totaluploadprogress", function (progress) {
        document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
    });
    myDropzone.on("sending", function (file) {
        // Show the total progress bar when upload starts
        document.querySelector("#total-progress").style.opacity = "1";
        // And disable the start button
//        file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
    });
// Hide the total progress bar when nothing's uploading anymore
    myDropzone.on("queuecomplete", function (progress) {
        document.querySelector("#total-progress").style.opacity = "0";
    });
    myDropzone.on("complete", function (file) {
        var obj = $.parseJSON(file.xhr.response);
        if (obj.success) {
            $('.comment_form_submit').prop('disabled', false);
            $('#comment_post_form').append('<input type="hidden" name="attchment_path[]" value="' + obj.filename + '">');
            $('#comment_post_form').append('<input type="hidden" name="attchment_type[]" value="' + obj.type + '">');
        }
//        console.log(obj);
//        document.querySelector("#total-progress").style.opacity = "0";
    });
// Setup the buttons for all transfers
// The "add files" button doesn't need to be setup because the config
// `clickable` has already been specified.
//    document.querySelector("#actions .start").onclick = function () {
//        myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
//    };
    document.querySelector(".md-close").onclick = function () {
        $('#comment_post_form').find('textarea').val('');
        $('#comment_post_form').find('input').remove();
        myDropzone.removeAllFiles(true);
    };</script>
<script>
    $('#comment_post_form').find('textarea').on('keyup', function () {
//        console.log($('#comment_post_form').find('input').length);
        if ($('#comment_post_form').find('textarea').val() != '' || $('#comment_post_form').find('input').length != 0) {
            $('.comment_form_submit').prop('disabled', false);
        } else {
            $('.comment_form_submit').prop('disabled', true);
        }
    });
    $('.comment_form_submit').on('click', function () {
        if ($('#comment_post_form').find('textarea').val() != '' || $('#comment_post_form').find('input').length != 0) {
            var data = $('#comment_post_form').serialize();
            postComment(data);
//            $('#comment_post_form').submit();
        } else {
            alert("Please write somthing to submit the form");
        }
    });
</script>
<script>
    function postComment(data) {
        $.ajax({
            'url': '<?php echo site_url('Index/post_comment') ?>',
            'data': data,
            'type': 'post',
            success: function (result) {
                var obj = $.parseJSON(result);
                var html = '';
                if (obj.success) {
                    $.each(obj.comment, function (index, comments) {
                        var user_image = base_url + 'uploads/images/user.png'
                        if (comments.Photo != '') {
                            user_image = base_url + 'uploads/images/' + comments.Photo;
                        }

                        var user_image = base_url + 'uploads/images/user.png';
                        if (comments.Photo != '') {
                            user_image = base_url + 'uploads/images/' + comments.Photo;
                        }
                        html += '<img src="' + user_image + '" alt="user-image"/>';


                        html += '<div class="layout-column comment-section" data-post_id = "' + comments.COM_ID + '">';
                        html += '<div class="layout-row user-comments">';
                        html += '<a href="' + base_url + 'index.php/User/profile/' + comments.UID + '"><img src="' + user_image + '" alt="user-image"/></a>';
                        html += '<div class="comment-wrap"> ' + comments.FirstName + ' ' + comments.LastName + '</div>';
                        html += '</div>';
                        if (comments.COMMENTS != '') {
                            html += '<div class="layout-row user-comments">';
                            html += '<div class="">';
                            html += '<span>' + comments.COMMENTS + '</span>';
                            html += '</div>';
                            html += '</div>';
                        }
                        if (comments.attachment != null) {
                            $.each(comments.attachment, function (key, attach) {
                                if (attach.attachment_type == 'audios') {
                                    html += '<div class="layout-column layout-align-center-center" data-att_id="' + attach.att_id + '">';
                                    html += '<audio controls>';
                                    html += '<source src="' + base_url + '/uploads/audios/' + attach.attachment_path + '" type="audio/ogg">';
                                    html += '</audio>';
                                    html += '</div>';
                                } else if (attach.attachment_type == 'videos') {
                                    html += '<div class="layout-column layout-align-center-center" data-att_id="' + attach.att_id + '">';
                                    html += '<video height="auto" controls>';
                                    html += '<source src="' + base_url + '/uploads/videos/' + attach.attachment_path + '" type="video/mp4">';
                                    html += '</video>';
                                    html += '</div>';
                                } else if (attach.attachment_type == 'images') {
                                    html += '<div class="layout-column layout-align-center-center" data-att_id="' + attach.att_id + '">';
                                    html += '<img src="' + base_url + '/uploads/images/' + attach.attachment_path + '" height = 170>';
                                    html += '</div>';
                                }
                            });
                        }
                        html += '<div class="layout-row action-wrapper">';
                        if (comments.song) {
                            html += '<div class="layout-row layout-align-start-center flex-25"><a href="javascript:void(0)" class="like_button" onclick="likeFunction(this, ' + comments.ID + ')" data-post_type="1" data-response_type="1" data-commentid="' + comments.ID + '"><i class="fa fa-thumbs-up"></i> Like </a></div>';
                        } else {
                            html += '<div class="layout-row layout-align-start-center flex-25"><a href="javascript:void(0)" class="like_button" onclick="likeFunction(this, ' + comments.COM_ID + ')" data-post_type="2" data-response_type="1" data-commentid="' + comments.COM_ID + '"><i class="fa fa-thumbs-up"></i> Like </a></div>';
                        }
                        if (comments.song) {
                            html += '<div class="layout-row layout-align-start-center flex-25"><a href="javascript:void(0)" class="dislike_button" onclick="likeFunction(this, ' + comments.ID + ')" data-post_type="1" data-response_type="2" data-commentid="' + comments.ID + '"><i class="fa fa-thumbs-down"></i> Dislike </a> </div>';
                        } else {
                            html += '<div class="layout-row layout-align-start-center flex-25"><a href="javascript:void(0)" class="dislike_button" onclick="likeFunction(this, ' + comments.COM_ID + ')" data-post_type="2" data-response_type="2" data-commentid="' + comments.COM_ID + '"><i class="fa fa-thumbs-down"></i> Dislike </a></div>';
                        }
                        html += '<div class="layout-row layout-align-start-center flex-25" ><a href="#" class="comment_button"><i class="fa fa-comment"></i>Comments</a></div>';
                        html += '</div>';
                        html += '<div class="comment_textarea" style="display:none">';
                        html += '<textarea class="col-md-11" placeholder="Comment"></textarea>';
                        html += '<button class="btn btn-info col-md-1 comment_submit" onclick="commentSubmit(this);"><i class="fa fa-arrow-right"></i></button>';
                        html += '</div>';
                        html += '</div>';
                    });

                    $('#public_wall').prepend(html);
                    $('.md-close').trigger('click');
                    $('.comment_button').on('click', function () {
                        $(this).parent().parent().parent().find('.comment_textarea').show();
                    });
                } else {
                    alert(obj.msg);
                }
            }
        });
    }

    function get_post(data) {

        $.ajax({
            'url': '<?php echo site_url('Index/get_posts') ?>',
            'data': data,
            'type': 'post',
            success: function (result) {
                var obj = $.parseJSON(result);
                offset_song = obj.song_offset;
                var html = '';
                if (obj.success) {
                    $.each(obj.comment, function (index, comments) {
//                        console.log(comments);
                        var user_image = base_url + 'uploads/images/user.png'
                        if (comments.Photo != '') {
                            user_image = base_url + 'uploads/images/' + comments.Photo;
                        }
                        if (comments.song) {
                            html += '<div class="layout-column comment-section" data-song_id = "' + comments.ID + '">';
                        } else {
                            html += '<div class="layout-column comment-section" data-post_id = "' + comments.COM_ID + '">';
                        }
                        html += '<div class="layout-row user-comments profile_info" data-location="' + base_url + 'index.php/User/profile/' + comments.UID + '">';
                        html += '<img src="' + user_image + '" alt="user-image"/>';
                        html += '<div class="comment-wrap">' + comments.FirstName + ' ' + comments.LastName + '</div>';
                        html += '</div><hr style="    margin-top: 5px;margin-bottom: 5px;">';
                        if (comments.song) {
                            html += '<div class="layout-row user-comments">';
                            html += '<div class="">';
                            html += '<span>' + comments.Song_Title + '</span>';
                            html += '</div>';
                            html += '</div>';
                            html += '<div class="layout-row user-comments">';
                            html += '<div class="">';
                            html += '<span>' + comments.synopsis + '</span>';
                            html += '</div>';
                            html += '</div>';
                            html += '<div class="layout-column layout-align-center-center" >';
                            html += '<a href="' + site_url + '/Video/index/' + comments.ID + '"><img src="' + base_url + '/uploads/images/' + comments.Image + '" height = 170></a>';
                            html += '</div>';
                        }
                        if (comments.COMMENTS != '' && !comments.song) {
                            html += '<div class="layout-row user-comments">';
                            html += '<div class="">';
                            html += '<span>' + comments.COMMENTS + '</span>';
                            html += '</div>';
                            html += '</div>';
                        }
                        if (comments.attachment != null && !comments.song) {
                            $.each(comments.attachment, function (key, attach) {
                                if (attach.attachment_type == 'audios') {
                                    html += '<div class="layout-column layout-align-center-center" data-att_id="' + attach.att_id + '">';
                                    html += '<audio controls>';
                                    html += '<source src="' + base_url + '/uploads/audios/' + attach.attachment_path + '" type="audio/ogg">';
                                    html += '</audio>';
                                    html += '</div>';
                                } else if (attach.attachment_type == 'videos') {
                                    html += '<div class="layout-column layout-align-center-center" data-att_id="' + attach.att_id + '">';
                                    html += '<video height="auto" controls>';
                                    html += '<source src="' + base_url + '/uploads/videos/' + attach.attachment_path + '" type="video/mp4">';
                                    html += '</video>';
                                    html += '</div>';
                                } else if (attach.attachment_type == 'images') {
                                    html += '<div class="layout-column layout-align-center-center" data-att_id="' + attach.att_id + '">';
                                    html += '<img src="' + base_url + '/uploads/images/' + attach.attachment_path + '" height = 170>';
                                    html += '</div>';
                                }
                            });
                        }
                        html += '<div class="layout-row action-wrapper">';
                        var response = comments.user_response;
//                        console.log(comments.user_response);
                        if (comments.song) {
                            if (response == '1') {
                                html += '<div class="layout-row layout-align-start-center flex-20"><a href="javascript:void(0)" class="like_button" onclick="likeFunction(this, ' + comments.ID + ')" data-post_type="1" data-response_type="1" data-commentid="' + comments.ID + '"><i class="fa fa-thumbs-up liked"></i></a>';

                            } else {
                                html += '<div class="layout-row layout-align-start-center flex-20"><a href="javascript:void(0)" class="like_button" onclick="likeFunction(this, ' + comments.ID + ')" data-post_type="1" data-response_type="1" data-commentid="' + comments.ID + '"><i class="fa fa-thumbs-up"></i></a>';

                            }
                            html += '<span class="like_count_span">';
                            if (comments.like_count) {
                                html += comments.like_count + ' Likes ';
                            }
                            html += '</span>';
                            html += '</div>';
                        } else {
                            if (response == '1') {
                                html += '<div class="layout-row layout-align-start-center flex-20"><a href="javascript:void(0)" class="like_button" onclick="likeFunction(this, ' + comments.COM_ID + ')" data-post_type="2" data-response_type="1" data-commentid="' + comments.COM_ID + '"><i class="fa fa-thumbs-up liked"></i></a>';
                            } else {
                                html += '<div class="layout-row layout-align-start-center flex-20"><a href="javascript:void(0)" class="like_button" onclick="likeFunction(this, ' + comments.COM_ID + ')" data-post_type="2" data-response_type="1" data-commentid="' + comments.COM_ID + '"><i class="fa fa-thumbs-up"></i></a>';
                            }
                            html += '<span class="like_count_span">';
                            if (comments.like_count) {
                                html += comments.like_count + ' Likes ';
                            }
                            html += '</span>';
                            html += '</div>';
                        }
                        if (comments.song) {
                            if (response == 2) {
                                html += '<div class="layout-row layout-align-start-center flex-20"><a href="javascript:void(0)" class="dislike_button" onclick="likeFunction(this, ' + comments.ID + ')" data-post_type="1" data-response_type="2" data-commentid="' + comments.ID + '"><i class="fa fa-thumbs-down disliked"></i></a>';
                            } else {
                                html += '<div class="layout-row layout-align-start-center flex-20"><a href="javascript:void(0)" class="dislike_button" onclick="likeFunction(this, ' + comments.ID + ')" data-post_type="1" data-response_type="2" data-commentid="' + comments.ID + '"><i class="fa fa-thumbs-down"></i></a>';
                            }
                            html += '<span class="dislike_count_span">';
                            if (comments.dislike_count) {

                                html += comments.dislike_count + ' Dislikes';
                            }
                            html += '</span>';
                            html += ' </div>';
                        } else {
                            if (response == 2) {
                                html += '<div class="layout-row layout-align-start-center flex-20"><a href="javascript:void(0)" class="dislike_button" onclick="likeFunction(this, ' + comments.COM_ID + ')" data-post_type="2" data-response_type="2" data-commentid="' + comments.COM_ID + '"><i class="fa fa-thumbs-down disliked"></i></a>';
                            } else {
                                html += '<div class="layout-row layout-align-start-center flex-20"><a href="javascript:void(0)" class="dislike_button" onclick="likeFunction(this, ' + comments.COM_ID + ')" data-post_type="2" data-response_type="2" data-commentid="' + comments.COM_ID + '"><i class="fa fa-thumbs-down"></i></a>';
                            }
                            html += '<span class="dislike_count_span">';
                            if (comments.dislike_count) {

                                html += comments.dislike_count + ' Dislikes';
                            }
                            html += '</span>';
                            html += ' </div>';
                        }
                        html += '<div class="layout-row layout-align-start-center flex-25" ><a href="#" class="comment_button"><i class="fa fa-comment"></i>Comments</a></div>';
//                        html += '<div class="layout-row layout-align-end-center flex-20"><i class="fa fa-share"></i> Share</div>';
                        html += '</div>';
                        html += '<div class="comment_textarea" style="display:none">';
                        html += '<textarea class="col-md-11" placeholder="Comment"></textarea>';
                        html += '<button class="btn btn-info col-md-1 comment_submit" onclick="commentSubmit(this);"><i class="fa fa-arrow-right"></i></button>';
                        html += '</div>';

                        if (typeof comments.subComments !== "undefined" && comments.subComments.length !== 0) {
                            html += '<div class="layout-row comment-wrap">';
//                            html += '<span class="flex-75">View Previous Comments</span>';
                            html += '</div>';
                            $.each(comments.subComments, function (scKey, sc) {
                                console.log(sc);
                                var sc_response = sc.user_response;
                                var user_image = base_url + 'uploads/images/user.png';
                                if (sc.Photo != '') {
                                    user_image = base_url + 'uploads/images/' + sc.Photo;
                                }
                                html += '<div class="layout-row user-comments" style="width:100%;">';
                                html += '<img src="' + user_image + '" alt="user-image"/>';
                                html += '<div class="layout-column user-detail" style="width:100%;">';
                                html += '<div class="layout-row">';
                                html += '<span class="user-name">' + sc.FirstName + ' ' + sc.LastName + '</span>';
                                html += '<span>' + sc.COMMENTS + '</span>';
                                html += '</div>';
                                html += '<div class="layout-row action-wrapper">';
                                if (sc_response == '1') {
                                    html += '<div class="layout-row layout-align-start-center flex-20"><a href="javascript:void(0)" class="like_button" onclick="likeFunction(this, ' + sc.COM_ID + ')" data-post_type="3" data-response_type="1" data-commentid="' + sc.COM_ID + '"><i class="fa fa-thumbs-up liked"></i></a>';
                                } else {
                                    html += '<div class="layout-row layout-align-start-center flex-20"><a href="javascript:void(0)" class="like_button" onclick="likeFunction(this, ' + sc.COM_ID + ')" data-post_type="3" data-response_type="1" data-commentid="' + sc.COM_ID + '"><i class="fa fa-thumbs-up"></i></a>';
                                }
                                html += '<span class="like_count_span">';
                                if (sc.like_count) {
                                    html += sc.like_count + ' Likes';
                                }
                                html += '</span>';
                                html += '</div>';
                                if (sc_response == '2') {
                                    html += '<div class="layout-row layout-align-start-center flex-20"><a href="javascript:void(0)" class="dislike_button" onclick="likeFunction(this, ' + sc.COM_ID + ')" data-post_type="3" data-response_type="2" data-commentid="' + sc.COM_ID + '"><i class="fa fa-thumbs-down disliked"></i></a>';
                                } else {
                                    html += '<div class="layout-row layout-align-start-center flex-20"><a href="javascript:void(0)" class="dislike_button" onclick="likeFunction(this, ' + sc.COM_ID + ')" data-post_type="3" data-response_type="2" data-commentid="' + sc.COM_ID + '"><i class="fa fa-thumbs-down"></i></a>';
                                }
                                html += '<span class="dislike_count_span">';
                                if (sc.dislike_count) {
                                    html += sc.dislike_count + ' Dislikes';
                                }
                                html += '</span>';
                                html += '</div>';
                                html += '</div>';
                                html += '</div>';
                                html += '<hr>';
                                html += '</div>';
                            });
                        }
                        html += '</div>';
                    });

                    $('#public_wall').append(html);
                    $('.md-close').trigger('click');
                    $('.comment_button').on('click', function () {
                        $(this).parent().parent().parent().find('.comment_textarea').show();
                    });

                    $(".profile_info").mouseover(function () {
                        $(this).css('cursor', 'pointer');
                    });

                    $('.profile_info').on("click", function () {
                        var user = '<?php echo $_SESSION['user_data']['UID']; ?>';
                        var location = $(this).data("location");
                        if (user) {
                            window.location.replace(location);
                        } else {
                            alert('Please Login to use the service.');
                        }
                    });
                }
                if (obj.comment.length !== 0) {
                    offset += limit;
//                    offset_ind += limit_ind;
                    get_post({'limit': limit, 'offset': offset, 'offset_song': offset_song});
                }
            }

        });
    }

    function likeFunction(element, commentId) {

        var post_type = $(element).data('post_type');
        var response_type = $(element).data('response_type');
        var userid = '<?php echo $_SESSION['user_data']['UID']; ?>';

        if (userid) {
            $.ajax({
                'url': '<?php echo site_url('Index/like'); ?>',
                'data': {'comment_id': commentId, 'post_type': post_type, 'response_type': response_type, 'userid': userid},
                'type': 'post',
                success: function (result) {
                    var obj = $.parseJSON(result);
                    console.log(obj);
                    if (obj.msg == '1') {
                        $(element).find('i').addClass('liked');
                        $(element).parent().next().find('.dislike_button').find('i').removeClass('disliked');
                    } else if (obj.msg == '2') {
                        $(element).find('i').addClass('disliked');
                        $(element).parent().prev().find('.like_button').find('i').removeClass('liked');
                    } else {
                        $(element).find('i').removeClass('liked');
                        $(element).find('i').removeClass('disliked');
                    }
                    if (obj.likeCount != 0) {
                        $(element).parent().parent().find(".like_count_span").html(obj.likeCount + ' Likes');
                    } else {
                        $(element).parent().parent().find(".like_count_span").html('');
                    }
                    if (obj.dislikeCount != 0) {
                        $(element).parent().parent().find('.dislike_count_span').html(obj.dislikeCount + ' Dislikes');
                    } else {
                        $(element).parent().parent().find('.dislike_count_span').html('');
                    }
                }
            });

        } else {
            alert('Please Login to use the Service!!!');
        }
    }

    function get_post_industry(data) {

        $.ajax({
            'url': '<?php echo site_url('Index/get_posts_industry') ?>',
            'data': data,
            'type': 'post',
            success: function (result) {
                var obj = $.parseJSON(result);
                var html = '';
                if (obj.success) {
                    $.each(obj.comment, function (index, comments) {
                        var user_image = base_url + 'uploads/images/user.png'
                        if (comments.Photo != '') {
                            user_image = base_url + 'uploads/mages/' + comments.Photo;
                        }

                        html += '<div class="layout-column comment-section" data-post_id = "' + comments.COM_ID + '">';
                        html += '<div class="layout-row user-comments">';
                        html += '<img src="' + user_image + '" alt="user-image"/>';
                        html += '<div class="comment-wrap"><a href="#"> ' + comments.FirstName + ' ' + comments.LastName + ' </a></div>';
                        html += '</div>';
                        if (typeof comments.COMMENTS !== "undefined" && comments.COMMENTS != '') {
                            html += '<div class="layout-row user-comments">';
                            html += '<div class="">';
                            html += '<span>' + comments.COMMENTS + '</span>';
                            html += '</div>';
                            html += '</div>';
                        }
                        if (comments.attachment != null) {
                            $.each(comments.attachment, function (key, attach) {
                                if (attach.attachment_type == 'audios') {
                                    html += '<div class="layout-column layout-align-center-center" data-att_id="' + attach.att_id + '">';
                                    html += '<audio controls>';
                                    html += '<source src="' + base_url + '/uploads/audios/' + attach.attachment_path + '" type="audio/ogg">';
                                    html += '</audio>';
                                    html += '</div>';
                                } else if (attach.attachment_type == 'videos') {
                                    html += '<div class="layout-column layout-align-center-center" data-att_id="' + attach.att_id + '">';
                                    html += '<video height="auto" controls>';
                                    html += '<source src="' + base_url + '/uploads/videos/' + attach.attachment_path + '" type="video/mp4">';
                                    html += '</video>';
                                    html += '</div>';
                                } else if (attach.attachment_type == 'images') {
                                    html += '<div class="layout-column layout-align-center-center" data-att_id="' + attach.att_id + '">';
                                    html += '<img src="' + base_url + '/uploads/images/' + attach.attachment_path + '" height = 170>';
                                    html += '</div>';
                                }
                            });
                        }
                        if (typeof comments.COMMENTS !== "undefined" && comments.COMMENTS != '') {
                            html += '<div class="layout-row action-wrapper">';
                            html += '<div class="layout-row layout-align-start-center flex-20"><i class="fa fa-thumbs-up"></i> Like</div>';
                            html += '<div class="layout-row layout-align-start-center flex-20"><i class="fa fa-comment"></i> Comments</div>';
//                        html += '<div class="layout-row layout-align-end-center flex-20"><i class="fa fa-share"></i> Share</div>';
                            html += '</div>';
                        }
                        if (comments.like_count) {
                            html += '<div class="layout-row comment-count">';
                            html += '<span><i class="fa fa-thumbs-up"></i></span>';
                            html += '<a href="#">' + comments.like_count + ' Likes</a>';
                            html += '</div>';
                        }

                        if (typeof comments.COMMENTS !== "undefined" && comments.subComments != null) {
                            html += '<div class="layout-row comment-wrap">';
                            html += '<span class="flex-75">View Previous Comments</span>';
                            html += '</div>';
                            $.each(comments.subComments, function (scKey, sc) {
                                var user_image = base_url + 'uploads/images/user.png'
                                if (sc.Photo != '') {
                                    user_image = base_url + 'uploads/images/' + sc.Photo;
                                }
                                html += '<div class="layout-row user-comments">';
                                html += '<img src="' + user_image + '" alt="user-image"/>';
                                html += '<div class="layout-column user-detail">';
                                html += '<div class="layout-row">';
                                html += '<span class="user-name">' + sc.FirstName + ' ' + sc.LastName + '</span>';
                                html += '<span>' + sc.COMMENTS + '</span>';
                                html += '</div>';
                                html += '<div class="layout-row">';
                                html += '<span class="user-name">Like</span>';
//                                html += '<span class="user-name">Reply</span>';
//                                html += '<span>28 min</span>';
                                html += '</div>';
                                html += '</div>';

                                html += '</div>';
                            });
                        }
                        html += '</div>';
                    });

                    $('.industry_wall').append(html);
                    $('.md-close').trigger('click');
                    if (obj.comment.length !== 0) {
                        offset_ind += limit_ind;
                        get_post_industry({'limit': limit_ind, 'offset': offset_ind});
                    }
                }
            }
        });
    }



    function commentSubmit(ele) {
            console.log(ele);
        var user = '<?php echo $_SESSION['user_data']['UID']; ?>';
        if (user) {
            var comment = $(ele).parent().find('textarea').val();
            var post_id = $(ele).parent().parent().attr('data-post_id');
            var song_id = $(ele).parent().parent().attr('data-song_id');
            if (typeof post_id === "undefined") {
                var data = {'parent_id': '-1', 'COMMENTS': comment, 'Song_id': song_id};
            } else {
                var data = {'parent_id': post_id, 'COMMENTS': comment};
            }
            $.ajax({
                'url': '<?php echo site_url('Index/post_comment') ?>',
                'data': data,
                'type': 'post',
                success: function (result) {
                    var obj = $.parseJSON(result);
                    console.log(obj);
                    var html = '';
                    if (obj.success) {

                        $.each(obj.comment, function (scKey, sc) {
                            var user_image = base_url + 'uploads/images/user.png'
                            if (sc.Photo != '') {
                                user_image = base_url + 'uploads/images/' + sc.Photo;
                            }
                            html += '<div class="layout-row user-comments">';
                            html += '<img src="' + user_image + '" alt="user-image"/>';
                            html += '<div class="layout-column user-detail">';
                            html += '<div class="layout-row">';
                            html += '<span class="user-name">' + sc.FirstName + ' ' + sc.LastName + '</span>';
                            html += '<span>' + sc.COMMENTS + '</span>';
                            html += '</div>';
                            html += '<div class="layout-row action-wrapper">';
                            html += '<div class="layout-row layout-align-start-center flex-20"><a href="javascript:void(0)" class="like_button" onclick="likeFunction(this, ' + sc.COM_ID + ' )" data-post_type="3" data-response_type="1" data-commentid="' + sc.COM_ID + '"><i class="fa fa-thumbs-up"></i></a><span class="like_count_span"></span></div>';
                            html += '<div class="layout-row layout-align-start-center flex-20"><a href="javascript:void(0)" class="dislike_button" onclick="likeFunction(this, ' + sc.COM_ID + ' )" data-post_type="3" data-response_type="2" data-commentid="' + sc.COM_ID + '"><i class="fa fa-thumbs-down"></i></a><span class="dislike_count_span"></span></div>';
                            html += '</div>';
                            html += '</div>';

                            html += '</div>';
                        });

                        $(ele).parent().parent().last().append(html);
                    }
                }
            });
        } else {
            alert('Please Login to user the service.');
        }
    }
</script>
