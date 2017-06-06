<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Add User</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form id="song_add_form" method="post" action="<?php echo site_url('User/edit') ?>" data-parsley-validate class="form-horizontal form-label-left">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">UserName <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="UserName" name="UserName" required="required" value="<?php echo isset($formdata[0]['UserName']) && !empty($formdata[0]['UserName']) ? $formdata[0]['UserName'] : ''; ?>" class="form-control col-md-7 col-xs-12">
                                    <input type="hidden" id="UID" name="UID" required="required" value="<?php echo isset($formdata[0]['UID']) && !empty($formdata[0]['UID']) ? $formdata[0]['UID'] : '';?>" class="form-control col-md-7 col-xs-12">                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="FirstName">First Name
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="FirstName" name="FirstName"  value="<?php echo isset($formdata[0]['FirstName']) && !empty($formdata[0]['FirstName']) ? $formdata[0]['FirstName'] : ''; ?>" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="LastName">Last Name
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="LastName" name="LastName"  value="<?php echo isset($formdata[0]['LastName']) && !empty($formdata[0]['LastName']) ? $formdata[0]['LastName'] : ''; ?>" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Email">Email
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="Email" name="Email" value="<?php echo isset($formdata[0]['Email']) && !empty($formdata[0]['Email']) ? $formdata[0]['Email'] : ''; ?>" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Password">Password 
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="password" id="Password" name="Password" value="<?php echo isset($formdata[0]['Password']) && !empty($formdata[0]['Password']) ? $formdata[0]['Password'] : ''; ?>" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="AboutMe">About
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea type="text" id="AboutMe" name="AboutMe" class="form-control col-md-7 col-xs-12"><?php echo isset($formdata[0]['AboutMe']) && !empty($formdata[0]['AboutMe']) ? $formdata[0]['AboutMe'] : ''; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="City">City
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="City" name="City" value="<?php echo isset($formdata[0]['City']) && !empty($formdata[0]['City']) ? $formdata[0]['City'] : ''; ?>" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="State">State
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="State" name="State" value="<?php echo isset($formdata[0]['State']) && !empty($formdata[0]['State']) ? $formdata[0]['State'] : ''; ?>" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Country">Country
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="Country" name="Country" value="<?php echo isset($formdata[0]['Country']) && !empty($formdata[0]['Country']) ? $formdata[0]['Country'] : ''; ?>" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="DOB">DOB
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="DOB" name="Date" value="<?php echo isset($formdata[0]['DOB']) && !empty($formdata[0]['DOB']) ? $formdata[0]['DOB'] : ''; ?>" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="DateJoined">Date Joined
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="DOJ" name="Date" value="<?php echo isset($formdata[0]['DateJoined']) && !empty($formdata[0]['DateJoined']) ? $formdata[0]['DateJoined'] : ''; ?>" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Photo">Photo
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <span class="btn btn-primary btn-file">
                                                Browse&hellip; <input type="file" single>
                                            </span>
                                        </span>
                                        <input type="text" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Website">Website
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="Website" name="Website" value="<?php echo isset($formdata[0]['Website']) && !empty($formdata[0]['Website']) ? $formdata[0]['Website'] : ''; ?>" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <?php // var_dump($userType); ?>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="UserType">User Type
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="UserType" id="UserType" class="form-control col-md-7 col-xs-12">
                                        <option value="0" disabled>Please Select One</option>
                                        <?php
                                        if (isset($userType) && !empty($userType)) {
                                            foreach ($userType as $uType) {
                                                ?>
                                                <option value="<?php echo $uType['ID'] ?>"><?php echo $uType['User_Type'] ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="reset" class="btn btn-primary">Reset</button>
                                    <?php if (@$formdata[0]) { ?>
                                        <button type="submit" class="btn btn-success" name="update" value="update">Update</button>
                                    <?php } else { ?>
                                        <button type="submit" class="btn btn-success" name="add" value="add">Submit</button>
                                    <?php } ?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .btn-file {
        position: relative;
        overflow: hidden;
    }
    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        background: red;
        cursor: inherit;
        display: block;
    }
    input[readonly] {
        background-color: white !important;
        cursor: text !important;
    }
</style>