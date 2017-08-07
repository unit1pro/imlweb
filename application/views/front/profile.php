<?php
//echo $_SESSION['user_data']['UID'];
//echo $profile_data[0]['UID'];
//exit;
?>
<div class="row">
    <!-- right column -->
    <div id="profile_info" class="container target">
        <div class="row">
            <div class="col-sm-10">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-3">
                <!--left col-->
                <div class="panel panel-default">
                    <ul class="list-group">
                        <li class="list-group-item text-muted" contenteditable="false">Profile 
                            <?php if ($_SESSION['user_data']['UID'] == $profile_data[0]['UID']) { ?>
                                <a id="profile_update_button" class="pull-right "><i class="fa fa-pencil-square-o"></i> Update</a></li>                            
                        <?php } ?>
                        <?php if (isset($profile_data[0]['FirstName']) && $profile_data[0]['FirstName'] != '') { ?>
                            <li class="list-group-item text-right"><span class="pull-left"><strong class="">Full name</strong></span><?php echo $profile_data[0]['FirstName'] . ' ' . $profile_data[0]['LastName']; ?></li>
                        <?php
                        }
                        if (isset($profile_data[0]['DOB']) && $profile_data[0]['DOB'] != '') {
                            ?>
                            <li class="list-group-item text-right"><span class="pull-left"><strong class="">Date of Birth </strong></span><?php echo $profile_data[0]['DOB']; ?></li>
                        <?php
                        }
                        if (isset($profile_data[0]['DateJoined']) && $profile_data[0]['DateJoined'] != '') {
                            ?>
                            <li class="list-group-item text-right"><span class="pull-left"><strong class="">Joined</strong></span><?php echo $profile_data[0]['DateJoined']; ?></li>
<?php } ?>
                    </ul>
                </div>

<?php if (isset($profile_data[0]['Website']) && !empty($profile_data[0]['Website'])) { ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
                        <div class="panel-body"><a href="<?php echo prep_url($profile_data[0]['Website']); ?>" target="_blank" class=""><?php echo $profile_data[0]['Website']; ?></a></div>
                    </div>
<?php } ?>

                <div class="panel panel-default">
                    <ul class="list-group">
                        <li class="list-group-item text-muted">Contact <i class="fa fa-dashboard fa-1x"></i></li>
                        <?php if (isset($profile_data[0]['ContactMe']) && $profile_data[0]['ContactMe'] != '') { ?>
                            <li class="list-group-item text-right"><span class="pull-left"><strong class="">Mobile</strong></span><?php echo $profile_data[0]['ContactMe']; ?></li>
                        <?php
                        }
                        if (isset($profile_data[0]['Email']) && $profile_data[0]['Email'] != '') {
                            ?>
                            <li class="list-group-item text-right"><span class="pull-left"><strong class="">Email</strong></span><?php echo $profile_data[0]['Email']; ?></li>
                        <?php
                            }
                            if (isset($profile_data[0]['City']) && $profile_data[0]['City'] != '') {
                                ?>
                            <li class="list-group-item text-right"><span class="pull-left"><strong class="">Address</strong></span><?php echo $profile_data[0]['City'] . ' ' . $profile_data[0]['State'] . ' ' . $profile_data[0]['Country']; ?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <!--/col-3-->
            <div class="col-sm-9" style="" contenteditable="false" >
                <div class="panel panel-default">
                    <div class="panel-heading"><?php echo $profile_data[0]['UserName']; ?>'s Bio</div>
                    <div class="panel-body"><?php echo (isset($profile_data[0]['AboutMe']) && !empty($profile_data[0]['AboutMe'])) ? $profile_data[0]['AboutMe'] : 'About Not Found!!!'; ?>

                        <?php
                        if ($profile_data[0]['fullUrlPhoto']) {
                            $userImageHeader = isset($profile_data[0]) && $profile_data[0]['Photo'] != '' ? $profile_data[0]['Photo'] : base_url('front') . '/images/user-image.png';
                        } else {
                            $userImageHeader = isset($profile_data[0]) && $profile_data[0]['Photo'] != '' ? base_url('uploads/images') . '/' . $profile_data[0]['Photo'] : base_url('front') . '/images/user-image.png';
                        }
                        ?>
                        <img id="profile_pic" src="<?php echo $userImageHeader; ?>" name="photo" class="img-rounded img-responsive pull-right" width="100" height="100" alt="User Image">
                    </div>
                </div>
                <div class="panel panel-default target">
                    <div class="panel-heading" contenteditable="false">Recent Posts</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-8 col-sm-offset-2 user_post_container">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- left column -->
    <form id="formdata" action="<?php echo site_url('User/update_profile'); ?>" method="post" class="form-horizontal" enctype="multipart/form-data" role="form" style="display:none;margin:100px 0;">
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="text-center">
                        <?php 
                        if ($profile_data[0]['fullUrlPhoto']) {
                            $userImageHeader = isset($profile_data[0]) && $profile_data[0]['Photo'] != '' ? $profile_data[0]['Photo'] : base_url('front') . '/images/user-image.png';
                        } else {
                            $userImageHeader = isset($profile_data[0]) && $profile_data[0]['Photo'] != '' ? base_url('uploads/images') . '/' . $profile_data[0]['Photo'] : base_url('front') . '/images/user-image.png';
                        }
                        ?>
                <img id="profile_pic" src="<?php echo $userImageHeader; ?>" name="photo" class="avatar img-rounded img-thumbnail" alt="User Image">
                <h6>Upload a different photo...</h6>
                <input type="file" id="upload" name="upload" class="text-center center-block well well-sm">
            </div>
        </div>
        <!-- edit form column -->
        <div class="col-md-8 col-sm-6 col-xs-12 personal-info">

            <input type="hidden" name="photo_name" id="photo_name" value="<?php echo $profile_data[0]['Photo']; ?>">
            <div class="form-group">
                <label class="col-md-3 control-label">First name:</label>
                <div class="col-md-8">
                    <input class="form-control" name="FirstName" value="<?php echo $profile_data[0]['FirstName']; ?>" type="text">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Last name:</label>
                <div class="col-md-8">
                    <input class="form-control" name="LastName" value="<?php echo $profile_data[0]['LastName']; ?>" type="text">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Email:</label>
                <div class="col-md-8">
                    <input class="form-control" name="Email" value="<?php echo $profile_data[0]['Email']; ?>" type="text">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Website:</label>
                <div class="col-md-8">
                    <input class="form-control" name="Website" value="<?php echo $profile_data[0]['Website']; ?>" type="text">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Contact Me:</label>
                <div class="col-md-8">
                    <input class="form-control" name="ContactMe" value="<?php echo $profile_data[0]['ContactMe']; ?>" type="text">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Date of Birth</label>
                <div class="col-md-8">
                    <input class="form-control" name="DOB" value="<?php echo $profile_data[0]['DOB']; ?>" type="text">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">City</label>
                <div class="col-md-8">
                    <input class="form-control" name="City" value="<?php echo $profile_data[0]['City']; ?>" type="text">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">State</label>
                <div class="col-md-8">
                    <input class="form-control" name="State" value="<?php echo $profile_data[0]['State']; ?>" type="text">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Country</label>
                <div class="col-md-8">
                    <input class="form-control" name="Country" value="<?php echo $profile_data[0]['Country']; ?>" type="text">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">About Me:</label>
                <div class="col-md-8">
                    <input class="form-control" name="AboutMe" value="<?php echo $profile_data[0]['AboutMe']; ?>" type="textarea">
                </div>
            </div>
            <div class="form-group">
                <label class="controls col-md-3 control-label"></label>
                <div class="col-md-8">
                    <!--<div class="row">-->
                    <span class="col-sm-4">
                        <input id="profile_submit" name="update" class="btn btn-primary" value="Save" type="submit"><br>                            
                    </span>
                    <span class="col-sm-4">
                        <input class="btn btn-default" value="Reset" type="reset"><br>                            
                    </span>
                    <span class="col-sm-4">
                        <input id="back_profile" class="btn btn-default" value="Back" type="button">                                                    
                    </span>
                    <!--</div>-->                        
                </div>
            </div>
        </div>
    </form>
</div>

