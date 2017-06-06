<?php  
//print_r($songs_data);
//print_r($expression);
?>

<div class="">
         <div class="col-xs-12 col-md-3 nopadding-left mt50">
            <div class="left-panel">
                <div class="">
                <?php
                    if (isset($user_data[0]['UID'])) {
                        $userImageHeader = isset($user_data) && $user_data[0]['Photo'] != '' ? base_url('uploads/images') . '/' . $user_data[0]['Photo'] : base_url('front') . '/images/user-image.png';
                        ?>
                <img src="<?php echo $userImageHeader; ?>" class="userpic"/>
                <span class="userName ml15"><?php echo $user_data[0]['FirstName'].' '. $user_data[0]['LastName'] ?></span>
                <?php } ?>
                <?php
                    if (!isset($user_data[0]['UID'])) {
                        $userImageHeader = base_url('front') . '/images/user-image.png';
                        ?>
                <img src="<?php echo $userImageHeader; ?>" class="userpic"/>
                <span class="userName ml15">Guest</span>
                <?php } ?>
                </div>
                <div class="clear"></div>
                
<!--                <ul class="links">
                   <li><a href=""><img src="<?php echo base_url() ?>front/images/community-ico.jpg"> Community home</a></li>
                   <li><a href=""><img src="<?php echo base_url() ?>front/images/playlist-icon.jpg"> Playlists</a></li>
                   <li><a href=""><img src="<?php echo base_url() ?>front/images/singers-icon.jpg"> Singers</a></li>
                   <li><a href=""><img src="<?php echo base_url() ?>front/images/following-icon.jpg"> Following</a></li>
                   <li><a href=""><img src="<?php echo base_url() ?>front/images/following1-icon.jpg"> Following</a></li>
                </ul>-->
            </div>
         </div>
         
          <div class="col-xs-12 col-md-6 mt50">
<!--             <div class="breadcrumb-nav">
             <span><img src="<?php echo base_url() ?>front/images/section-icon.png"/></span>
             <a href="#">Community</a> <span>&gt;</span> <span>User</span>             
             </div>-->
             
             <div class="addPost">
                <div class="col-xs-2 col-sm-1 nopadding-left">
                  <div class="user-pic"><img src="<?php echo base_url() ?>front/images/profile-pic.jpg"/></div>
                </div>
                 <div class="col-xs-10 col-sm-11 nopadding-left">
                     <textarea name="postText" placeholder="Music is..." data-modal="modal-12" rows="1" class="views" id="post_comment_sudo"></textarea>
                </div>
                <div class="clear"></div>
             </div>

             <div id="public_wall">
                 
                 
                </div>

      </div>
      
          <div class="col-xs-12 col-md-3 mt50">
             <div class="rightPanel">
                 <div class="singerPic">
                      <a href="javascript:void(0)">
                     <img src="<?php echo base_url() ?>front/assets/images/shikhar.jpg" class="album_image">
                      </a>
                     <div class="singerName">Shikhar Kumar<br>Coming Soon</div>
                  </div>
                      <?php foreach ($songs_data as $song) { ?>
<!--                  <div class="singerPic">
                      <a href="////<?php echo site_url('Video/index/') . $song['ID'] ?>">
                     <img src="////<?php echo base_url('uploads/images') . '/' . $song['Image'] ?>" class="album_image">
                      </a>
                     <div class="singerName">////<?php echo $song['Song_Title'] ?></div>
                  </div>-->
                     <?php } ?>
<!--                  <div class="singerPic">
                     <img src="<?php echo base_url() ?>front/images/singer-pic-2.jpg">
                     <div class="singerName">Shikhar</div>
                  </div>
                  <div class="singerPic">
                     <img src="<?php echo base_url() ?>front/images/singer-pic-3.jpg">
                     <div class="singerName">Shikhar</div>
                  </div>-->
             </div>
          </div>      
    </div>






<div class="md-container md-effect-12" id="modal-12">
    <div class="md-content post_views_container" >
        <?php if (!isset($user_data[0]['UID'])) {?>
        <div class="row" style="    margin-top: 126px;
    background: #fff;
    border-radius: 20px;">
                <div class="col-md-8">
        <h4> Please login to post</h4>
                </div>
                <div class="col-md-4">
                    <div class="col-md-6">
                        <button class="md-close btn btn-danger">Cancel</button>
                    </div>
                    <div class="col-md-6">
                        <!--<button class="btn btn-primary comment_form_submit" disabled>Post</button>-->
                    </div>
                </div>
            </div>
        <?php }else{ ?>
        <!--<h3>Your</h3>-->
        <div class="drop_area" style="padding: 15px 7px 10px;background: #066686;">
            <form class="" action="" method="post" id="comment_post_form">
                <div class="form-group">
                    <textarea class="form-control" name="COMMENTS" placeholder="Write Something" id="post_textarea"></textarea>
                </div>
            </form>

            <div id="actions" class="row">

                <div class="col-lg-7">
                    <!-- The file input-button span is used to style the file input field as button -->
                    <span class="btn fileinput-button" style="color: #ffffff;">
                        <i class="glyphicon glyphicon-plus"></i>
                        <span >Click To Add files Or Drop Your Files Here</span>
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
                        <button class="btn btn-primary comment_form_submit" disabled>Post</button>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

