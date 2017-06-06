<?php
$imageUploadPath = UPLOADS . '/images';
$videoUploadPath = UPLOADS . '/videos';
$song_id = $songs_data[0]['ID'];
?>
<style>
    .clickable{pointer-events: none;}
    .video_container{
        padding: 0 !important;
        margin-bottom: 0 !important;
        background: #000 !important;
        text-align: center;
        /*    position: fixed;
         width: 100%;
         height: 100%;*/
        overflow: hidden;
        /*max-width: 100%;*/
    }

    .video_container .overlay{
        position: absolute;
/*        width: 100%;
        height:100%;*/
        background:#000;
        opacity:0.5;
        z-index:999;
    }

    .video_container .overlay .text-container{
        width:100%;
        text-align:left;
        padding: 0 30px;
    }

    .video_container .overlay .text-container h4{
        color:#FFF;
        text-transform:uppercase;
    }
</style>
<section>
    <div class="col-sm-8">
        <div class="">
            <div class="video_container">
<!--                <div class="overlay">
                    <div class="text-container">

                        <h4>Please choose video</h4>
                        <div>
                            <div class="layout-row" style="padding: 5px;">
                                <a href="<?php echo site_url('Video/index/') . $songs_data[0]['ID'] ?>">
                                    <img src="<?php echo base_url('uploads/images') . '/' . $songs_data[0]['Image'] ?>" width="100">
                                </a>
                            </div>
                            <div class="layout-column user-detail">
                                <span class="user-name"><?php echo $songs_data[0]['Song_Title'] ?></span>
                            </div>
                            <?php foreach ($artistAllVideo as $artist_video1) { ?>
                            <div class="layout-row" style="padding: 5px;">
                                <a href="<?php echo site_url('Video/index/') . $artist_video1['ID'] ?>">
                                    <img src="<?php echo base_url('uploads/images') . '/' . $artist_video1['Image'] ?>" width="100">
                                </a>
                            </div>
                            <div class="layout-column user-detail">
                                <span class="user-name"><?php echo $artist_video1['Song_Title'] ?></span>
                            </div>
                            <?php
                        }
                        ?>
                        </div>
                    </div>
                </div>-->
                <video height="320" controls >
                    <source src="<?php echo base_url() . '/uploads/videos/' . $songs_data[0]['Song_File_Name'] ?>" type="video/mp4">
                </video>
            </div>
            <div class="layout-column">
                <div class="layout-row layout-xs-column youtube-user-detail">
                    <div class="flex-100 flex-xs-100 layout-column layout-align-start-start">
                        <h4><?php echo $songs_data[0]['Song_Title'] ?></h4>
                    </div>

                    <div class="flex-50 flex-xs-100 layout-align-end-end layout-row">
                        <h4 id="views"><?php echo ($songs_data[0]['HITS']) ? $songs_data[0]['HITS'] . ' Views' : '0' . ' View'; ?></h4>
                    </div>
                </div>
                <div class="layout-row">
                    <div class="topic-detail layout-column">
                        <span>Published on <?php echo date('M d, Y', strtotime($songs_data[0]['created_On'])) ?></span>
                        <span><?php echo isset($song_data[0]['synopsis']) && $song_data[0]['synopsis'] != '' ? $song_data[0]['synopsis'] : '' ?></span>
                        <!--<button>Show more</button>-->
                    </div>
                </div>
                <div class="layout-row  share-it">
                    <span class="layout-row flex-20 layout-align-start-center">
                        <!--<i class="fa fa-plus"></i>Add to-->
                    </span>
                    <span class="layout-row flex-30 layout-align-start-center">
                        <!--<i class="fa fa-share"></i> share-->
                    </span>
                    <span class="layout-row flex-30 layout-align-start-center">
                        <!--<i class="fa fa-ellipsis-h"></i>More-->
                    </span>
                    <span class="layout-row flex-20 layout-align-end-center">
                        <div class="layout-row action-wrapper" style="width:100%">
                            <div class="layout-row layout-align-start-center flex-50"><a href="javascript:void(0)" class="like_button" onclick="likeFunction(this, <?php echo $song_id; ?>)" data-post_type="1" data-response_type="1" data-commentid="<?php echo $song_id; ?>"><i class="fa fa-thumbs-up <?php echo isset($user_response) && $user_response == 1 ? 'liked' : '' ?>"></i></a><span class="like_count_span"><?php echo $total_likes != 0 ? $total_likes . ' Like' : ''; ?></span></div>
                            <div class="layout-row layout-align-start-center flex-50"><a href="javascript:void(0)" class="dislike_button" onclick="likeFunction(this, <?php echo $song_id; ?>)" data-post_type="1" data-response_type="2" data-commentid="<?php echo $song_id; ?>"><i class="fa fa-thumbs-down  <?php echo isset($user_response) && $user_response == 2 ? 'disliked' : '' ?>"></i></a><span class="dislike_count_span"><?php echo $total_dislikes != 0 ? $total_dislikes . ' Dislike' : ''; ?></span></div>
                        </div>
                    </span>
                </div>
            </div>
            <div class="layout-column user-comment-area">
                <?php
                $userImage = isset($user_data[0]) && $user_data[0]['Photo'] != '' ? base_url('uploads/images') . '/' . $user_data[0]['Photo'] : base_url('front') . '/img/user-image.png';
                ?>
                <div class="layout-row user-comments-youtube input-section">
                    <img src="<?php echo $userImage ?>" alt="user-image"/>
                    <div class="input-area" data-userId = <?php echo isset($user_data[0]) && $user_data[0]['UID'] ? $user_data[0]['UID'] : '' ?>>
                        <textarea name="comment_field" class="comment_field" placeholder="Write a Comments" style="width: 100%" rows="3"></textarea>
                        <a href="javascript:void(0)" class="post_comment"><i class="fa fa-check-circle fa-3x" style="    color: #105704;"></i></a>
                    </div>
                </div>
                <div id="comment_section">
                    <?php
                    if (isset($comments) && !empty($comments)) {
                        foreach ($comments as $comment) {
                            $userImageComment = isset($comment) && $comment['Photo'] != '' ? base_url('uploads/images/') . '/' . $comment['Photo'] : base_url('front') . '/img/user-image.png';
                            ?>
                            <div class="layout-row user-comments-youtube">
                                <img src="<?php echo $userImageComment ?>" alt="user-image"/>
                                <div class="layout-column user-detail flex-90" id="main_comment">
                                    <div class="layout-row">
                                        <div class="layout-column flex-90">
                                            <div class="layout-row">
                                                <span class="user-name"><?php echo $comment['FirstName'] . ' ' . $comment['LastName'] ?></span>
                                                <!--<span>3 min agao</span>-->
                                            </div>  
                                            <div><?php echo $comment['COMMENTS'] ?></div>
                                            <div class="layout-row action-wrapper">
                                                <div class="layout-row layout-align-start-center flex-15"><a href="javascript:void(0)" class="like_button" onclick="likeFunction(this, <?php echo $comment['COM_ID']; ?>)" data-post_type="3" data-response_type="1" data-commentid="<?php echo $comment['COM_ID']; ?>"><i class="fa fa-thumbs-up <?php echo isset($comment['user_response']) && $comment['user_response'] == 1 ? 'liked' : '' ?>"></i></a><span class="like_count_span"><?php echo $comment['total_likes'] != 0 ? $comment['total_likes'] . ' Like' : ''; ?></span></div>
                                                <div class="layout-row layout-align-start-center flex-15"><a href="javascript:void(0)" class="dislike_button" onclick="likeFunction(this, <?php echo $comment['COM_ID']; ?>)" data-post_type="3" data-response_type="2" data-commentid="<?php echo $comment['COM_ID']; ?>"><i class="fa fa-thumbs-down <?php echo isset($comment['user_response']) && $comment['user_response'] == 2 ? 'disliked' : '' ?>"></i></a><span class="dislike_count_span"><?php echo $comment['total_dislikes'] != 0 ? $comment['total_dislikes'] . ' Dislike' : ''; ?></span></div>
                                            </div>
                                        </div>
                                        <div class="float-right flex-10 layout-row layout-align-end-start"><i class="fa fa-ellipsis-v"></i></div> 
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="layout-column flex-30 flex-xs-100 more-video-secton ">
            <div class="layout-column youtube-more-section">
                <p>Some More Songs of Same Artist</p>
                <div class="flex-25 flex-xs-100 layout-column video-section" style="overflow: hidden;">
                    <div style="height: 100%;width: 100%;overflow-y: auto;" class="video-section1">
                        <?php
                        foreach ($artistAllVideo as $artist_video) {
                            if ($artist_video['ID'] == $song_id)
                                continue;
                            ?>
                            <div class="layout-row">
                                <a href="<?php echo site_url('Video/index/') . $artist_video['ID'] ?>">
                                    <img src="<?php echo base_url('uploads/images') . '/' . $artist_video['Image'] ?>" width="166">
                                </a>
                            </div>
                            <div class="layout-column user-detail">
                                <span class="user-name"><?php echo $artist_video['Song_Title'] ?></span>
                            </div>
                        <?php } ?>
                        <p>Songs from other Artists</p>
                        <?php
                        foreach ($allVideos as $song) {
                            if ($song['ID'] == $song_id)
                                continue;
                            ?>
                            <div class="layout-row">
                                <a href="<?php echo site_url('Video/index/') . $song['ID'] ?>">
                                    <img src="<?php echo base_url('uploads/images') . '/' . $song['Image'] ?>" width="166">
                                </a>
                            </div>
                            <div class="layout-column user-detail">
                                <span class="user-name"><?php echo $song['Song_Title'] ?></span>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    var base_url = '<?php echo base_url() ?>';
    var site_url = '<?php echo site_url() ?>';
    var views = $('#views').html();
    var new_view = views.match(/\d+/)[0];
    new_view++;
    var song_id = '<?php echo $songs_data[0]['ID']; ?>';

    var limit = 2;
    var offset = 0;
    var offset_song = 0;

    $(document).ready(function () {
        $('.video_container .overlay').width($('.video_container').width());
        $('.video_container .overlay').height($('.video_container').height());
        
        $('.video-section1').height($(window).height() - $('header').height());
        post_hit_count({'new_view': new_view, 'song_id': song_id});
        setTimeout(function(){ 
             $('.video_container .overlay').hide();
             $('video')[0].play();
        }, 5000);
    });

    function post_hit_count(data) {
        $.ajax({
            'url': '<?php echo site_url('Video/post_hit_count') ?>',
            'data': data,
            'type': 'post',
            success: function (result) {
//                    console.log(result);
            }
        });
    }

    $('.post_comment').click(function (e) {
        var user_id = $(this).parent().data('userid');
        if (user_id) {
            var comment = $(this).parent().find('textarea').val();
            post_comment(comment, user_id, '<?php echo $song_id; ?>');
        } else {
//                login_popup();
            alert("Please Login to use the service.");
        }
    });

    function post_comment(comment, user_id, song_id) {
        if (comment != '' && user_id && song_id) {
            var data = {'COMMENTS': comment, 'user_id': user_id, 'Song_id': song_id};
            $.ajax({
                url: site_url + '/index/post_comment',
                data: data,
                type: 'post',
                success: function (result) {
                    var obj = $.parseJSON(result);
                    console.log(obj);
                    var html = '';
                    if (obj.success) {
                        $.each(obj.comment, function (index, comments) {
                            var user_image = base_url + 'uploads/images/user.png';
                            if (comments.Photo != '') {
                                user_image = base_url + 'uploads/images/' + comments.Photo;
                            }
                            html += '<div class="layout-row user-comments-youtube">';
                            html += '<img src="' + user_image + '" alt="user-image"/>';
                            html += '<div class="layout-column user-detail flex-90" id="main_comment">';
                            html += '<div class="layout-row">';
                            html += '<div class="layout-column flex-90">';
                            html += '<div class="layout-row">';
                            html += '<span class="user-name">' + comments.FirstName + ' ' + comments.LastName + '</span>';
                            html += '</div>';
                            html += '<div>' + comments.COMMENTS + '</div>';

                            html += '<div class="layout-row action-wrapper">';
                            html += '<div class="layout-row layout-align-start-center flex-15"><a href="javascript:void(0)" class="like_button" onclick="likeFunction(this, ' + comments.COM_ID + ' )" data-post_type="3" data-response_type="1" data-commentid="' + comments.COM_ID + '"><i class="fa fa-thumbs-up"></i></a><span class="like_count_span"></span></div>';
                            html += '<div class="layout-row layout-align-start-center flex-15"><a href="javascript:void(0)" class="dislike_button" onclick="likeFunction(this, ' + comments.COM_ID + ' )" data-post_type="3" data-response_type="2" data-commentid="' + comments.COM_ID + '"><i class="fa fa-thumbs-down"></i></a><span class="dislike_count_span"></span></div>';
                            html += '</div>';

                            html += '</div>';
                            html += '<div class="float-right flex-10 layout-row layout-align-end-start"><i class="fa fa-ellipsis-v"></i></div> ';
                            html += '</div>';
                            html += '</div>';
                            html += '</div>';
                        });
                        console.log(html);
                        $('#comment_section').prepend(html);
                    }
                }
            });
        }
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
                        $(element).parent().parent().find(".like_count_span").html(obj.likeCount + ' Like');
                    } else {
                        $(element).parent().parent().find(".like_count_span").html('');
                    }
                    if (obj.dislikeCount != 0) {
                        $(element).parent().parent().find('.dislike_count_span').html(obj.dislikeCount + ' Dislike');
                    } else {
                        $(element).parent().parent().find('.dislike_count_span').html('');
                    }
                }
            });

        } else {
            alert('Please Login to use the Service!!!');
        }
    }
</script>

