<!-- Button trigger modal -->
<button id="launchModal" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#errorModal" style="display:none">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 id="error_msg" class="modal-title"></h4>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header panel-heading danger" style="background: #b10000;color: #ffffff;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 id="error_msg" class="modal-title">Are you sure you want to delete post this can not be undone.</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" onclick="deletePost()">Delete</button>
            </div>
        </div>
    </div>
</div>

</div>



</div>



<script src="<?php echo base_url() ?>front/assets/js/jquery-3.2.1.min.js" ></script>
<script src="<?php echo base_url() ?>front/assets/plugins/bootstrap/js/bootstrap.min.js" ></script>
<!--<script src="<?php echo base_url() ?>front/assets/plugins/jQuery-LiveUrl-master/jquery.liveurl.js" ></script>-->

<script src="<?php echo base_url() ?>front/js/public.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>front/js/build.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>/vendors/nefty_popup/dist/jquery.niftymodals.js"></script>
<script>
                    var deleteElement = null;
//    var stickyOffset = $('.sticky').offset().top;
                    $(document).ready(function () {


                        var error = '<?php echo $this->session->alert_msg; ?>';
                        console.log(error);
                        if (error) {
                            $('#error_msg').text(error);
                            $('#errorModal').modal('show');
                        }

                        var status = '<?php echo $_SESSION['login_msg']; ?>';
                        if (status) {
                            alert(status);
                        }

                        $('.views').on('click', function () {
                            console.log(this);
                            var modal = $(this).data('modal');
                            $("#" + modal).niftyModal();
                        });
                        $('.forgot').on('click', function (e) {
                            $('.login_signup_section').slideUp();
                            $('.forgetPasswordSection').show();
                        });
                        $('.laginBack').on('click', function (e) {
                            $('.login_signup_section').slideDown();
                            $('.forgetPasswordSection').hide();
                        });
//        $('#comment_post_form textarea').liveUrl({
//            success: function (data)
//            {
//                var url = data.url;
//                console.log(url);
//                // this return the first found url data
//            }
//        });


//        $(window).scroll(function(){
//             var sticky = $('.sticky'),
//      scroll = $(window).scrollTop();
//
//  if (scroll >= 100) sticky.addClass('fixed');
//  else sticky.removeClass('fixed');
//          });
                    });

                    $(document).ready(function () {
                        $.ajaxSetup({cache: true});
                        $.getScript('//connect.facebook.net/en_US/sdk.js', function () {
                            FB.init({
                                appId: '121648458423604',
                                version: 'v2.9' // or v2.1, v2.2, v2.3, ...
                            });

                            $(".shareBtn").on('click', function (event) {
                                FB.ui({
                                    method: 'share',
                                    display: 'popup',
                                    // href: 'https://developers.facebook.com/docs/',
                                    href: '<?php echo site_url('Community/sharer/') ?>',
                                }, function (response) {});
                            });
                        });
                    });

</script> 
<script>
    // this is important for IEs
    var polyfilter_scriptpath = '<?php echo base_url(); ?>/vendors/nefty_popup/lib/js/';</script>

<script src="<?php echo base_url(); ?>/vendors/nefty_popup/lib/js/cssParser.js"></script>
<script src="<?php echo base_url(); ?>/vendors/nefty_popup/lib/js/css-filters-polyfill.js"></script>


<script>
    var Dropzone = require("enyo-dropzone");
    Dropzone.autoDiscover = false;
</script>


<script>
    $('.tab a').on('click', function (e) {
        e.preventDefault();

        $(this).parent().addClass('active');
        $(this).parent().siblings().removeClass('active');

        target = $(this).attr('href');

        $('.tab-content > div').not(target).hide();

        $(target).fadeIn(600);

    });
</script>

<script>
    var base_url = '<?php echo base_url() ?>';
    var site_url = '<?php echo site_url() ?>';
    var limit = 4;
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


        $('#post_textarea').keyup(function () {
            $('#post_comment_sudo').val($('#post_textarea').val());
        });



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

    $(window).scroll(function () {
        if ($(window).scrollTop() + $(window).height() == $(document).height()) {
            offset += limit;
            get_post({'limit': limit, 'offset': offset, 'offset_song': offset_song});
//                    get_post_by_user({'limit': limit, 'offset': offset, 'offset_song': offset_song,'UID':profile_user});
        }
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
        url: "<?php echo site_url('Community/uploadFiles') ?>", // Set the url
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
        console.log(file);
        var obj = $.parseJSON(file.xhr.response);
        if (obj.success) {
            console.log(obj);
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
        $('#post_comment_sudo').val('');
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
            'url': '<?php echo site_url('Community/post_comment') ?>',
            'data': data,
            'type': 'post',
            success: function (result) {
//                console.log(result);
                var obj = $.parseJSON(result);
                var html = '';
                if (obj.success) {
                    $.each(obj.comment, function (index, comments) {
//                        console.log(comments);
                        var user_image = base_url + 'uploads/images/user.png'
                        if (comments.Photo != '') {
                            if (comments.fullUrlPhoto) {
                                user_image = comments.Photo;
                            } else {
                                user_image = base_url + 'uploads/images/' + comments.Photo;
                            }
                        }
                        if (comments.song) {
                            html += '<div class="post-item" data-song_id = "' + comments.ID + '">';
                        } else {
                            html += '<div class="post-item" data-post_id = "' + comments.COM_ID + '">';
                        }
                        var st = comments.created_On;
                        var dt = new Date(st);
                        var date = dt.getDate();
                        var year = dt.getYear();
                        var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                        var month = monthNames[dt.getMonth()];
                        var hours = dt.getHours();
                        var min = dt.getMinutes();


                        html += '<div class="postTop">'
                        html += '<img src="' + user_image + '" alt="user-image" class="userpic profile_info" data-location="' + base_url + 'index.php/User/profile/' + comments.UID + '"/>';
                        html += '<div class="postDetails">';
                        html += '<div class="name col-sm-8"><h6>' + comments.FirstName + ' ' + comments.LastName + '</h6><span>'+month+' '+date+', '+year+' at '+hours+':'+min+' </span></div>';
                                html += '<div class="PostMenu col-sm-4">';
                        html += '<div class="dropdown">';
                        html += '<a href="javascript:void(0);" onclick="PostMenu(this)" class="dropbtn"><i class="fa fa-angle-down"></i></a>';
                        html += '<div id="myDropdown" class="dropdown-content postMenuDropdown">';
                        html += '<a href="javascript:void(0);" onclick="deleteConfirm(this);"><i class="fa fa-trash"></i></a>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        if (comments.song) {

                            html += '<div class="mediaSection text-section">';
                            html += '<p>' + comments.Song_Title + '</p>';
                            html += '</div>';


                            html += '<div class="mediaSection" >';
                            html += '<a href="' + site_url + '/Video/index/' + comments.ID + '"><img src="' + base_url + '/uploads/images/' + comments.Image + '"></a>';
                            html += '</div>';
                        }
                        if (comments.COMMENTS != '' && !comments.song) {

                            html += '<div class="mediaSection text-section">';
                            html += '<p>' + comments.COMMENTS + '</p>';
                            html += '</div>';


                        }
                        if (comments.attachment != null && !comments.song) {
                            $.each(comments.attachment, function (key, attach) {
                                if (attach.attachment_type == 'audios') {
                                    html += '<div class="mediaSection" data-att_id="' + attach.att_id + '">';
                                    html += '<audio controls>';
                                    html += '<source src="' + base_url + '/uploads/audios/' + attach.attachment_path + '" type="audio/mp3">';
                                    html += '</audio>';
                                    html += '</div>';
                                } else if (attach.attachment_type == 'videos') {
                                    html += '<div class="mediaSection" data-att_id="' + attach.att_id + '">';
                                    html += '<video height="auto" controls>';
                                    html += '<source src="' + base_url + '/uploads/videos/' + attach.attachment_path + '" type="video/mp4">';
                                    html += '</video>';
                                    html += '</div>';
                                } else if (attach.attachment_type == 'images') {
                                    html += '<div class="mediaSection" data-att_id="' + attach.att_id + '">';

                                    html += '<img src="' + base_url + '/uploads/images/' + attach.attachment_path + '">';
                                    html += '</div>';
                                }
                            });
                        }
                        html += '<div class="">';
                        var response = comments.user_response;
//                        console.log(comments.user_response);
                        if (comments.song) {
                            if (response == '1') {
                                html += '<div class="mediaSection text-section"><a href="javascript:void(0)" class="like_button" onclick="likeFunction(this, ' + comments.ID + ')" data-post_type="1" data-response_type="1" data-commentid="' + comments.ID + '"><i class="fa fa-thumbs-up liked"></i></a>';

                            } else {
                                html += '<div class="mediaSection text-section"><a href="javascript:void(0)" class="like_button" onclick="likeFunction(this, ' + comments.ID + ')" data-post_type="1" data-response_type="1" data-commentid="' + comments.ID + '"><i class="fa fa-thumbs-up"></i></a>';

                            }
                            html += '<span class="like_count_span">';
                            if (comments.like_count) {
                                html += comments.like_count + ' Likes ';
                            }
                            html += '</span>';
                            html += '</div>';
                        } else {
                            if (response == '1') {
                                html += '<div class="mediaSection text-section"><a href="javascript:void(0)" class="like_button" onclick="likeFunction(this, ' + comments.COM_ID + ')" data-post_type="2" data-response_type="1" data-commentid="' + comments.COM_ID + '"><i class="fa fa-thumbs-up liked"></i></a>';
                            } else {
                                html += '<div class="mediaSection text-section"><a href="javascript:void(0)" class="like_button" onclick="likeFunction(this, ' + comments.COM_ID + ')" data-post_type="2" data-response_type="1" data-commentid="' + comments.COM_ID + '"><i class="fa fa-thumbs-up"></i></a>';
                            }
                            html += '<span class="like_count_span">';
                            if (comments.like_count) {
                                html += comments.like_count + ' Likes ';
                            }
                            html += '</span>';
                            html += '</div>';
                        }

                        html += '</div>';
                        html += '<div class="comment_textarea leavecomment">';
                        html += '<input type="text" placeholder="Leave a Comment"/>';
//                        html += '<button class="btn btn-info col-md-1 comment_submit" onclick="commentSubmit(this);"><i class="fa fa-arrow-right"></i></button>';
                        html += '<a href="#" class="leaveCommentsBtn comment_submit mr15" onclick="commentSubmit(this);">+</a>';
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

    function PostMenu(obj) {
//    document.getElementById("myDropdown").classList.toggle("show");
        $(obj).parent().find('.postMenuDropdown').toggle("show");
    }
    function deleteConfirm(that) {
        deleteElement = that;
        $('#deleteModal').modal('show');

    }

    function deletePost() {
        $('#deleteModal').modal('hide');
//        console.log($(that).parent().parent().parent().parent().parent().parent().data('post_id'));
        var that = deleteElement;
        var postId = $(that).parent().parent().parent().parent().parent().parent().data('post_id');
        var data = {'postId': postId};
        $.ajax({
            'url': '<?php echo site_url('Community/delete_post') ?>',
            'data': data,
            'type': 'post',
            success: function (result) {
                var obj = $.parseJSON(result);
                console.log(obj.message);
                if (obj.success) {
                    $('#error_msg').text(obj.message);
                    $('#errorModal').modal('show');
//                    alert(obj.message);
                    $(that).parent().parent().parent().parent().parent().parent().remove();
                } else {
                    $('#error_msg').text(obj.message);
                    $('#errorModal').modal('show');
                }
//                console.log(obj.message);
            }
        });
    }

    function get_post(data) {

        $.ajax({
            'url': '<?php echo site_url('Community/get_posts') ?>',
            'data': data,
            'type': 'post',
            success: function (result) {
                var obj = $.parseJSON(result);
                var loggedInUser = '<?php echo $user_data[0]['UID'] ?>';
//                console.log(loggedInUser);
                offset_song = obj.song_offset;
                var html = '';
                if (obj.success) {
                    $.each(obj.comment, function (index, comments) {
//                        console.log(comments);
                        var user_image = base_url + 'uploads/images/user.png'
                        if (comments.Photo != '') {
                            if (comments.fullUrlPhoto) {
                                user_image = comments.Photo;
                            } else {
                                user_image = base_url + 'uploads/images/' + comments.Photo;
                            }
                        }
                        if (comments.song) {
                            html += '<div class="post-item" data-song_id = "' + comments.ID + '">';
                        } else {
                            html += '<div class="post-item" data-post_id = "' + comments.COM_ID + '">';
                        }
//                        html += '<div class="profile_info" data-location="' + base_url + 'index.php/User/profile/' + comments.UID + '">';
//                        html += '<img src="' + user_image + '" alt="user-image" class="userpic"/>';
                        var st = comments.created_On;
                        var dt = new Date(st);
                        var date = dt.getDate();
                        var year = dt.getFullYear();
                        var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                        var month = monthNames[dt.getMonth()];
                        var hours = dt.getHours();
                        var min = dt.getMinutes();
                        html += '<div class="postTop">'
                        html += '<img src="' + user_image + '" alt="user-image" class="userpic profile_info" data-location="' + base_url + 'index.php/User/profile/' + comments.UID + '"/>';
                        html += '<div class="postDetails">';
                        html += '<div class="name col-sm-8"><h6>' + comments.FirstName + ' ' + comments.LastName + '</h6><span>'+month+' '+date+', '+year+' at '+hours+':'+min+' </span></div>';
                        if (comments.Created_By == loggedInUser) {
                            html += '<div class="PostMenu col-sm-4">';
                            html += '<div class="dropdown">';
                            html += '<a href="javascript:void(0);" onclick="PostMenu(this)" class="dropbtn"><i class="fa fa-angle-down"></i></a>';
                            html += '<div id="myDropdown" class="dropdown-content postMenuDropdown">';
                            html += '<a href="javascript:void(0);" onclick="deleteConfirm(this);"><i class="fa fa-trash"></i></a>';
                            html += '</div>';
                            html += '</div>';
                            html += '</div>';
                        }

                        html += '</div>';
                        html += '</div>';
                        if (comments.song) {

                            html += '<div class="mediaSection text-section">';
                            html += '<p>' + comments.Song_Title + '</p>';
                            html += '</div>';


                            html += '<div class="mediaSection" >';
//                            html += '<a href="' + site_url + '/Video/index/' + comments.ID + '"><img src="<?php echo base_url() ?>front/images/post-image.jpg"></a>';
                            html += '<a href="' + site_url + '/Video/index/' + comments.ID + '"><img src="' + base_url + '/uploads/images/' + comments.Image + '"></a>';
                            html += '</div>';
                        }
                        if (comments.COMMENTS != '' && !comments.song) {

                            html += '<div class="mediaSection text-section">';
                            html += '<p>' + comments.COMMENTS + '</p>';
                            html += '</div>';


                        }
                        if (comments.attachment != null && !comments.song) {
                            $.each(comments.attachment, function (key, attach) {
                                if (attach.attachment_type == 'audios') {
                                    html += '<div class="mediaSection" data-att_id="' + attach.att_id + '">';
                                    html += '<audio width="538" controls>';
                                    html += '<source src="' + base_url + '/uploads/audios/' + attach.attachment_path + '" type="audio/mp3">';
                                    html += '</audio>';
                                    html += '</div>';
                                } else if (attach.attachment_type == 'videos') {
                                    html += '<div class="mediaSection" data-att_id="' + attach.att_id + '">';
                                    html += '<video height="auto" width="538" controls>';
                                    html += '<source src="' + base_url + '/uploads/videos/' + attach.attachment_path + '" type="video/mp4">';
                                    html += '</video>';
                                    html += '</div>';
                                } else if (attach.attachment_type == 'images') {
                                    html += '<div class="mediaSection" data-att_id="' + attach.att_id + '">';

                                    html += '<img src="' + base_url + '/uploads/images/' + attach.attachment_path + '">';
                                    html += '</div>';
                                }
                            });
                        }
                        html += '<div class="">';
                        var response = comments.user_response;
//                        console.log(comments.user_response);
                        if (comments.song) {
                            if (response == '1') {
                                html += '<div class="mediaSection text-section"><a href="javascript:void(0)" class="like_button" onclick="likeFunction(this, ' + comments.ID + ')" data-post_type="1" data-response_type="1" data-commentid="' + comments.ID + '"><i class="fa fa-thumbs-up liked"></i></a>';

                            } else {
                                html += '<div class="mediaSection text-section"><a href="javascript:void(0)" class="like_button" onclick="likeFunction(this, ' + comments.ID + ')" data-post_type="1" data-response_type="1" data-commentid="' + comments.ID + '"><i class="fa fa-thumbs-up"></i></a>';

                            }
                            html += '<span class="like_count_span">';
                            if (comments.like_count) {
                                html += comments.like_count + ' Likes ';
                            }
                            // html += '<i class="fa fa-eye " aria-hidden="true">Open to Share</i>';
//                            html += '<i class="fa  fa-share-alt shareBtn" aria-hidden="true"> Share</i>';
                            // html += '<div class="shareBtn btn btn-success clearfix">Share</div>';
                            html += '</span>';
                            html += '</div>';
                        } else {
                            if (response == '1') {
                                html += '<div class="mediaSection text-section"><a href="javascript:void(0)" class="like_button" onclick="likeFunction(this, ' + comments.COM_ID + ')" data-post_type="2" data-response_type="1" data-commentid="' + comments.COM_ID + '"><i class="fa fa-thumbs-up liked"></i></a>';
                            } else {
                                html += '<div class="mediaSection text-section"><a href="javascript:void(0)" class="like_button" onclick="likeFunction(this, ' + comments.COM_ID + ')" data-post_type="2" data-response_type="1" data-commentid="' + comments.COM_ID + '"><i class="fa fa-thumbs-up"></i></a>';
                            }
                            html += '<span class="like_count_span">';
                            if (comments.like_count) {
                                html += comments.like_count + ' Likes ';
                            }
                            // html += '<i class="fa fa-eye" aria-hidden="true"> Open to Share</i>';
                            // html += '<div class="shareBtn btn btn-success clearfix">Share</div>';
//                            html += '<i class="fa  fa-share-alt shareBtn" aria-hidden="true"> Share</i>';
                            html += '</span>';
                            html += '</div>';
                        }
//                        if (comments.song) {
//                            if (response == 2) {
//                                html += '<div class=""><a href="javascript:void(0)" class="dislike_button" onclick="likeFunction(this, ' + comments.ID + ')" data-post_type="1" data-response_type="2" data-commentid="' + comments.ID + '"><i class="fa fa-thumbs-down disliked"></i></a>';
//                            } else {
//                                html += '<div class=""><a href="javascript:void(0)" class="dislike_button" onclick="likeFunction(this, ' + comments.ID + ')" data-post_type="1" data-response_type="2" data-commentid="' + comments.ID + '"><i class="fa fa-thumbs-down"></i></a>';
//                            }
//                            html += '<span class="dislike_count_span">';
//                            if (comments.dislike_count) {
//
//                                html += comments.dislike_count + ' Dislikes';
//                            }
//                            html += '</span>';
//                            html += ' </div>';
//                        } else {
//                            if (response == 2) {
//                                html += '<div class=""><a href="javascript:void(0)" class="dislike_button" onclick="likeFunction(this, ' + comments.COM_ID + ')" data-post_type="2" data-response_type="2" data-commentid="' + comments.COM_ID + '"><i class="fa fa-thumbs-down disliked"></i></a>';
//                            } else {
//                                html += '<div class=""><a href="javascript:void(0)" class="dislike_button" onclick="likeFunction(this, ' + comments.COM_ID + ')" data-post_type="2" data-response_type="2" data-commentid="' + comments.COM_ID + '"><i class="fa fa-thumbs-down"></i></a>';
//                            }
//                            html += '<span class="dislike_count_span">';
//                            if (comments.dislike_count) {
//
//                                html += comments.dislike_count + ' Dislikes';
//                            }
//                            html += '</span>';
//                            html += ' </div>';
//                        }
//                        html += '<div class="layout-row layout-align-start-center flex-25" ><a href="#" class="comment_button"><i class="fa fa-comment"></i>Comments</a></div>';
//                        html += '<div class="layout-row layout-align-end-center flex-20"><i class="fa fa-share"></i> Share</div>';
                        html += '</div>';
                        html += '<div class="comment_textarea leavecomment">';
                        html += '<input type="text" placeholder="Leave a Comment" class="comment_field"/>';
                        html += '<a href="javascript:void(0);" class="leaveCommentsBtn comment_submit mr15" onclick="commentSubmit(this);">+</a>';
                        html += '</div>';
                        html += '<div class="comments_container">'


                        if (typeof comments.subComments !== "undefined" && comments.subComments.length !== 0) {
//                            html += '<div class="layout-row comment-wrap">';
//                            html += '<span class="flex-75">View Previous Comments</span>';
//                            html += '</div>';
                            $.each(comments.subComments, function (scKey, sc) {
//                                console.log(sc);
                                var sc_response = sc.user_response;
                                var user_image = base_url + 'uploads/images/user.png';
                                if (sc.Photo != '') {
                                    if (sc.fullUrlPhoto) {
                                        user_image = sc.Photo;
                                    } else {
                                        user_image = base_url + 'uploads/images/' + sc.Photo;
                                    }
                                }
                                html += '<div class="comments" data-post_id = "' + sc.COM_ID + '">';
                                html += '<img src="' + user_image + '" alt="user-image" class="userpic"/>';
                                html += '<div class="comment-text">';
//                                html += '<div class="">';
//console.log(loggedInUser);
//console.log(sc.ID);
                                html += '<span class=""><b>' + sc.FirstName + ' ' + sc.LastName + '</b>';
                                if (sc.ID == loggedInUser) {
                                    html += '<div class="PostMenu" style="width: 20%;float: right;text-align: right;margin-top: -15px;">';
                                    html += '<div class="dropdown">';
                                    html += '<a href="javascript:void(0);" onclick="PostMenu(this)" class="dropbtn"><i class="fa fa-angle-down"></i></a>';
                                    html += '<div id="myDropdown" class="dropdown-content postMenuDropdown">';
                                    html += '<a href="javascript:void(0);" onclick="deleteConfirm(this);"><i class="fa fa-trash"></i></a>';
                                    html += '</div>';
                                    html += '</div>';
                                    html += '</div>';
                                }
                                html += '<hr>';
                                html += '<br>' + sc.COMMENTS + '<br>';
                                if (sc_response == '1') {
                                    html += '<a href="javascript:void(0)" class="like_button comment_like_button" onclick="likeFunction(this, ' + sc.COM_ID + ')" data-post_type="3" data-response_type="1" data-commentid="' + sc.COM_ID + '"><i class="fa fa-thumbs-up liked"></i></a>';
                                } else {
                                    html += '<a href="javascript:void(0)" class="like_button comment_like_button" onclick="likeFunction(this, ' + sc.COM_ID + ')" data-post_type="3" data-response_type="1" data-commentid="' + sc.COM_ID + '"><i class="fa fa-thumbs-up"></i></a>';
                                }
                                html += '<div class="like_count_span">';
                                if (sc.like_count) {
                                    html += sc.like_count + ' Likes';
                                }
                                html += '</div>';
                                html += '</span>';

                                html += '</div>';
                                html += '</div>';

                            });
                        }

                        html += '</div>';
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
                            modalAlert();
                        }
                    });
                }
//                if (obj.comment.length !== 0) {
//                    offset += limit;
////                    offset_ind += limit_ind;
//                    get_post({'limit': limit, 'offset': offset, 'offset_song': offset_song});
//                }
            }

        });
    }

    function likeFunction(element, commentId) {

        var post_type = $(element).data('post_type');
        var response_type = $(element).data('response_type');
        var userid = '<?php echo $_SESSION['user_data']['UID']; ?>';

        if (userid) {
            $.ajax({
                'url': '<?php echo site_url('Community/like'); ?>',
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
            modalAlert();
        }
    }

    function modalAlert() {
        $('#error_msg').text('Please login to use the service!!!');
        $("#launchModal").trigger("click");
    }

    function get_post_industry(data) {

        $.ajax({
            'url': '<?php echo site_url('Community/get_posts_industry') ?>',
            'data': data,
            'type': 'post',
            success: function (result) {
                var obj = $.parseJSON(result);
                var html = '';
                if (obj.success) {
                    $.each(obj.comment, function (index, comments) {
                        var user_image = base_url + 'uploads/images/user.png'
                        if (comments.Photo != '') {
                            if (comments.fullUrlPhoto) {
                                user_image = comments.Photo;
                            } else {
                                user_image = base_url + 'uploads/images/' + comments.Photo;
                            }
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
        var user = '<?php echo $_SESSION['user_data']['UID']; ?>';
        if (user) {
            var comment = $(ele).parent().find('.comment_field').val();
            var post_id = $(ele).parent().parent().attr('data-post_id');
            var song_id = $(ele).parent().parent().attr('data-song_id');
            if (typeof post_id === "undefined") {
                var data = {'parent_id': '-1', 'COMMENTS': comment, 'Song_id': song_id};
            } else {
                var data = {'parent_id': post_id, 'COMMENTS': comment};
            }
            $.ajax({
                'url': '<?php echo site_url('Community/post_comment') ?>',
                'data': data,
                'type': 'post',
                success: function (result) {
                    var obj = $.parseJSON(result);
                    console.log(obj);
                    var html = '';
                    if (obj.success) {

                        $.each(obj.comment, function (scKey, sc) {
                            var sc_response = sc.user_response;
                            var user_image = base_url + 'uploads/images/user.png';
                            if (sc.Photo != '') {
                                if (sc.fullUrlPhoto) {
                                    user_image = sc.Photo;
                                } else {
                                    user_image = base_url + 'uploads/images/' + sc.Photo;
                                }
                            }
                            html += '<div class="comments" data-post_id = "' + sc.COM_ID + '">';
                            html += '<img src="' + user_image + '" alt="user-image" class="userpic"/>';
                            html += '<div class="comment-text">';
//                                html += '<div class="">';
                            html += '<span class=""><b>' + sc.FirstName + ' ' + sc.LastName + '</b>';
                            html += '<div class="PostMenu" style="width: 20%;float: right;text-align: right;margin-top: -15px;">';
                            html += '<div class="dropdown">';
                            html += '<a href="javascript:void(0);" onclick="PostMenu(this)" class="dropbtn"><i class="fa fa-angle-down"></i></a>';
                            html += '<div id="myDropdown" class="dropdown-content postMenuDropdown">';
                            html += '<a href="javascript:void(0);" onclick="deleteConfirm(this);"><i class="fa fa-trash"></i></a>';
                            html += '</div>';
                            html += '</div>';
                            html += '</div>';
                            html += '<hr>';
                            html += '<br>' + sc.COMMENTS + '<br>';
                            html += '<a href="javascript:void(0)" class="like_button comment_like_button" onclick="likeFunction(this, ' + sc.COM_ID + ')" data-post_type="3" data-response_type="1" data-commentid="' + sc.COM_ID + '"><i class="fa fa-thumbs-up"></i></a>';

                            html += '<div class="like_count_span">';
                            if (sc.like_count) {
                                html += sc.like_count + ' Likes';
                            }
                            html += '</div>';
                            html += '</span>';

                            html += '</div>';
                            html += '</div>';
                        });
                        console.log($(ele).parent().parent().find('comment_container'));
                        console.log(html);

                        $(ele).parent().parent().last().append(html);
                    }
                }
            });
        } else {
            // alert('Please login to use this service');
            modalAlert();
        }
    }
</script> 

<!--profile page script-->

<script>
    var session_user = '<?php echo $_SESSION['user_data']['UID']; ?>';
    var profile_user = '<?php echo $this->uri->segment(3); ?>';

    $(document).ready(function () {
        $('#formdata').hide();
        get_post_by_user({'limit': 8, 'offset': 0, 'offset_song': 0, 'UID': profile_user});
    });
    $('#profile_update_button').on('click', function () {
        $('#profile_info').hide();
        $('#formdata').show();
    })
    $('#back_profile').on('click', function () {
        $('#formdata').hide();
        $('#profile_info').show();
    })

    if (session_user !== profile_user) {
        $("#formdata input").prop("disabled", true);
    }

    $("#upload").change(function () {
        var photo = $(this).val();
        photo = photo.replace(/^.*[\\\/]/, '');
        $('input#photo_name').val(photo);
    });


    function get_post_by_user(data) {

        $.ajax({
            'url': '<?php echo site_url('Community/get_posts_by_user') ?>',
            'data': data,
            'type': 'post',
            success: function (result) {
                var obj = $.parseJSON(result);
//                offset_song = obj.song_offset;
                var html = '';
                if (obj.success) {
                    $.each(obj.comment, function (index, comments) {
//                        console.log(comments);
                        var user_image = base_url + 'uploads/images/user.png'
                        if (comments.Photo != '') {
                            if (comments.fullUrlPhoto) {
                                user_image = comments.Photo;
                            } else {
                                user_image = base_url + 'uploads/images/' + comments.Photo;
                            }
                            ;
                        }
                        if (comments.song) {
                            html += '<div class="post-item" data-song_id = "' + comments.ID + '">';
                        } else {
                            html += '<div class="post-item" data-post_id = "' + comments.COM_ID + '">';
                        }
//                        html += '<div class="profile_info" data-location="' + base_url + 'index.php/User/profile/' + comments.UID + '">';
//                        html += '<img src="' + user_image + '" alt="user-image" class="userpic"/>';
                        html += '<div class="postTop">'
                        html += '<img src="' + user_image + '" alt="user-image" class="userpic profile_info" data-location="' + base_url + 'index.php/User/profile/' + comments.UID + '"/>';
                        html += '<div class="postDetails">';
                        html += '<div class="name">' + comments.FirstName + ' ' + comments.LastName + '</div>';
                        html += '</div>';
                        html += '</div>';
                        if (comments.song) {

                            html += '<div class="mediaSection text-section">';
                            html += '<p>' + comments.Song_Title + '</p>';
                            html += '</div>';


                            html += '<div class="mediaSection" >';
//                            html += '<a href="' + site_url + '/Video/index/' + comments.ID + '"><img src="<?php echo base_url() ?>front/images/post-image.jpg"></a>';
                            html += '<a href="' + site_url + '/Video/index/' + comments.ID + '"><img src="' + base_url + '/uploads/images/' + comments.Image + '"></a>';
                            html += '</div>';
                        }
                        if (comments.COMMENTS != '' && !comments.song) {

                            html += '<div class="mediaSection text-section">';
                            html += '<p>' + comments.COMMENTS + '</p>';
                            html += '</div>';


                        }
                        if (comments.attachment != null && !comments.song) {
                            $.each(comments.attachment, function (key, attach) {
                                if (attach.attachment_type == 'audios') {
                                    html += '<div class="mediaSection" data-att_id="' + attach.att_id + '">';
                                    html += '<audio controls>';
                                    html += '<source src="' + base_url + '/uploads/audios/' + attach.attachment_path + '" type="audio/mp3">';
                                    html += '</audio>';
                                    html += '</div>';
                                } else if (attach.attachment_type == 'videos') {
                                    html += '<div class="mediaSection" data-att_id="' + attach.att_id + '">';
                                    html += '<video height="auto" controls>';
                                    html += '<source src="' + base_url + '/uploads/videos/' + attach.attachment_path + '" type="video/mp4">';
                                    html += '</video>';
                                    html += '</div>';
                                } else if (attach.attachment_type == 'images') {
                                    html += '<div class="mediaSection" data-att_id="' + attach.att_id + '">';

                                    html += '<img src="' + base_url + '/uploads/images/' + attach.attachment_path + '">';
                                    html += '</div>';
                                }
                            });
                        }
                        html += '<div class="">';
                        var response = comments.user_response;
//                        console.log(comments.user_response);
                        if (comments.song) {
                            if (response == '1') {
                                html += '<div class="mediaSection text-section"><a href="javascript:void(0)" class="like_button" onclick="likeFunction(this, ' + comments.ID + ')" data-post_type="1" data-response_type="1" data-commentid="' + comments.ID + '"><i class="fa fa-thumbs-up liked"></i></a>';

                            } else {
                                html += '<div class="mediaSection text-section"><a href="javascript:void(0)" class="like_button" onclick="likeFunction(this, ' + comments.ID + ')" data-post_type="1" data-response_type="1" data-commentid="' + comments.ID + '"><i class="fa fa-thumbs-up"></i></a>';

                            }
                            html += '<span class="like_count_span">';
                            if (comments.like_count) {
                                html += comments.like_count + ' Likes ';
                            }
                            html += '</span>';
                            html += '</div>';
                        } else {
                            if (response == '1') {
                                html += '<div class="mediaSection text-section"><a href="javascript:void(0)" class="like_button" onclick="likeFunction(this, ' + comments.COM_ID + ')" data-post_type="2" data-response_type="1" data-commentid="' + comments.COM_ID + '"><i class="fa fa-thumbs-up liked"></i></a>';
                            } else {
                                html += '<div class="mediaSection text-section"><a href="javascript:void(0)" class="like_button" onclick="likeFunction(this, ' + comments.COM_ID + ')" data-post_type="2" data-response_type="1" data-commentid="' + comments.COM_ID + '"><i class="fa fa-thumbs-up"></i></a>';
                            }
                            html += '<span class="like_count_span">';
                            if (comments.like_count) {
                                html += comments.like_count + ' Likes ';
                            }
                            html += '</span>';
                            html += '</div>';
                        }
//                        if (comments.song) {
//                            if (response == 2) {
//                                html += '<div class=""><a href="javascript:void(0)" class="dislike_button" onclick="likeFunction(this, ' + comments.ID + ')" data-post_type="1" data-response_type="2" data-commentid="' + comments.ID + '"><i class="fa fa-thumbs-down disliked"></i></a>';
//                            } else {
//                                html += '<div class=""><a href="javascript:void(0)" class="dislike_button" onclick="likeFunction(this, ' + comments.ID + ')" data-post_type="1" data-response_type="2" data-commentid="' + comments.ID + '"><i class="fa fa-thumbs-down"></i></a>';
//                            }
//                            html += '<span class="dislike_count_span">';
//                            if (comments.dislike_count) {
//
//                                html += comments.dislike_count + ' Dislikes';
//                            }
//                            html += '</span>';
//                            html += ' </div>';
//                        } else {
//                            if (response == 2) {
//                                html += '<div class=""><a href="javascript:void(0)" class="dislike_button" onclick="likeFunction(this, ' + comments.COM_ID + ')" data-post_type="2" data-response_type="2" data-commentid="' + comments.COM_ID + '"><i class="fa fa-thumbs-down disliked"></i></a>';
//                            } else {
//                                html += '<div class=""><a href="javascript:void(0)" class="dislike_button" onclick="likeFunction(this, ' + comments.COM_ID + ')" data-post_type="2" data-response_type="2" data-commentid="' + comments.COM_ID + '"><i class="fa fa-thumbs-down"></i></a>';
//                            }
//                            html += '<span class="dislike_count_span">';
//                            if (comments.dislike_count) {
//
//                                html += comments.dislike_count + ' Dislikes';
//                            }
//                            html += '</span>';
//                            html += ' </div>';
//                        }
//                        html += '<div class="layout-row layout-align-start-center flex-25" ><a href="#" class="comment_button"><i class="fa fa-comment"></i>Comments</a></div>';
//                        html += '<div class="layout-row layout-align-end-center flex-20"><i class="fa fa-share"></i> Share</div>';
                        html += '</div>';
                        html += '<div class="comment_textarea leavecomment">';
                        html += '<input type="text" placeholder="Leave a Comment" class="comment_field"/>';
                        html += '<a href="#" class="leaveCommentsBtn comment_submit mr15" onclick="commentSubmit(this);">+</a>';
                        html += '</div>';
                        html += '<div class="comments_container">'


                        if (typeof comments.subComments !== "undefined" && comments.subComments.length !== 0) {
//                            html += '<div class="layout-row comment-wrap">';
//                            html += '<span class="flex-75">View Previous Comments</span>';
//                            html += '</div>';
                            $.each(comments.subComments, function (scKey, sc) {
//                                console.log(sc);
                                var sc_response = sc.user_response;
                                var user_image = base_url + 'uploads/images/user.png';
                                if (sc.Photo != '') {
                                    if (sc.fullUrlPhoto) {
                                        user_image = sc.Photo;
                                    } else {
                                        user_image = base_url + 'uploads/images/' + sc.Photo;
                                    }
                                }
                                html += '<div class="comments">';
                                html += '<img src="' + user_image + '" alt="user-image" class="userpic"/>';
                                html += '<div class="comment-text">';
//                                html += '<div class="">';
                                html += '<span class=""><b>' + sc.FirstName + ' ' + sc.LastName + '</b><hr>';
                                html += '<br>' + sc.COMMENTS + '<br>';
                                if (sc_response == '1') {
                                    html += '<a href="javascript:void(0)" class="like_button comment_like_button" onclick="likeFunction(this, ' + sc.COM_ID + ')" data-post_type="3" data-response_type="1" data-commentid="' + sc.COM_ID + '"><i class="fa fa-thumbs-up liked"></i></a>';
                                } else {
                                    html += '<a href="javascript:void(0)" class="like_button comment_like_button" onclick="likeFunction(this, ' + sc.COM_ID + ')" data-post_type="3" data-response_type="1" data-commentid="' + sc.COM_ID + '"><i class="fa fa-thumbs-up"></i></a>';
                                }
                                html += '<div class="like_count_span">';
                                if (sc.like_count) {
                                    html += sc.like_count + ' Likes';
                                }
                                html += '</div>';
                                html += '</span>';

                                html += '</div>';
                                html += '</div>';

                            });
                        }

                        html += '</div>';
                        html += '</div>';
                    });

                    $('.user_post_container').append(html);
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
                            modalAlert();
                        }
                    });
                }
//                if (obj.comment.length !== 0) {
//                    offset += limit;
////                    offset_ind += limit_ind;
//                    get_post({'limit': limit, 'offset': offset, 'offset_song': offset_song});
//                }
            }

        });
    }
    function fbRequest(response) {
        $('.loader').removeClass('hidden');
        $('.fbLogin').addClass('hidden');
        var location = response.location.name;
        var picture = response.picture.data.url
        var data = {'fId': response.id, 'Email': response.email, 'FirstName': response.first_name, 'LastName': response.last_name, 'DOB': response.birthday, 'address': location, 'Photo': picture};
        $.ajax({
            'url': '<?php echo site_url('User/fbLogin') ?>',
            'data': data,
            'type': 'post',
            'success': function (res) {
                console.log(res);
                var obj = $.parseJSON(res);
                if (obj.success) {
                    reload();
                } else {
                    $('#err_msg').text(obj.message);
                    $('#errorModal').modal('show');
                }

            }
        });


    }
    function reload() {
        window.location.reload();
    }

</script>
</body>
</html>
