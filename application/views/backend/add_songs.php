<?phpprint "<pre>";
print_r(formdata[0]);exit;?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Add Song</h3>
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
                        <form id="song_add_form" method="post" action="<?php echo site_url('Songs/edit') ?>" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Song_Title">Song Title <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="Song_Title" name="Song_Title" required="required" value="<?php echo isset($formdata[0]['Song_Title']) && !empty($formdata[0]['Song_Title']) ? $formdata[0]['Song_Title'] : '';?>" class="form-control col-md-7 col-xs-12">
                                    <input type="hidden" id="ID" name="ID" required="required" value="<?php echo isset($formdata[0]['ID']) && !empty($formdata[0]['ID']) ? $formdata[0]['ID'] : '';?>" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="composer">Composer
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="composer" name="composer" value="<?php echo isset($formdata[0]['composer']) && !empty($formdata[0]['composer'])? $formdata[0]['composer'] : '';?>" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="director">Director
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="director" name="director" value="<?php echo isset($formdata[0]['director']) && !empty($formdata[0]['director']) ? $formdata[0]['director'] : '';?>" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Writers">Writers 
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="Writers" name="Writers" value="<?php echo isset($formdata[0]['Writers']) && !empty($formdata[0]['Writers']) ? $formdata[0]['Writers'] : '';?>" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="synopsis">Synopsis
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="synopsis" name="synopsis" value="<?php echo isset($formdata[0]['synopsis']) && !empty($formdata[0]['synopsis']) ? $formdata[0]['synopsis'] : '';?>" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Date">Date
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="Date" name="Date" class="date-picker form-control col-md-7 col-xs-12" value="" required="required" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="UserType">Song Category
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="CAT_ID" id="CAT_ID" class="form-control col-md-7 col-xs-12">
                                        <option value="0" disabled>Please Select One</option>
                                        <?php
                                        if (isset($songCats) && !empty($songCats)) {
                                            foreach ($songCats as $songCat) {
                                                if($formdata[0]['CAT_ID'] == $songCat){?>
                                                        <option value="<?php echo $songCat['CAT_ID'] ?>" selected><?php echo $songCat['CAT_TYPE'] ?></option>
                                                    <?php
                                                } else {?>
                                                        <option value="<?php echo $songCat['CAT_ID'] ?>"><?php echo $songCat['CAT_TYPE'] ?></option>                                                    
                                                <?php }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="UserType">User Type
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="UID[]" id="UID" class="form-control col-md-7 col-xs-12" multiple>
                                        <option value="0" disabled>Please Select At least One</option>
                                        <?php
                                        if (isset($user_types) && !empty($user_types)) {          
                                            foreach ($user_types as $type) {
                                                ?>
                                                <option value="<?php echo $type['ID'] ?>" selected><?php echo $type['User_Type']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Image">Thumbnail
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <!--<input type="file" id="Image" name="Image" class="form-control col-md-7 col-xs-12">-->
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <span class="btn btn-primary btn-file">
                                                Browse&hellip; <input type="file" name="Image" single>
                                            </span>
                                        </span>
                                        <input type="text" id="Image" name="Image" value="<?php echo isset($formdata[0]['Image']) && !empty($formdata[0]['Image']) ? $formdata[0]['Image'] : '';?>" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Song_File_Name">Song
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <!--<input type="file" id="Song_File_Name" name="Song_File_Name" class="form-control col-md-7 col-xs-12">-->
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <span class="btn btn-primary btn-file">
                                                Browse&hellip; <input type="file" name="Song_File_Name" single>
                                            </span>
                                        </span>
                                        <input type="text" id="Song_File_Name" name="Song_File_Name" value="<?php echo isset($formdata[0]['Song_File_Name']) && !empty($formdata[0]['Song_File_Name']) ? $formdata[0]['Song_File_Name'] : '';?>" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>


                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="reset" class="btn btn-primary">Reset</button>
                                    <?php if (@$formdata[0]){?>
                                        <button type="submit" class="btn btn-success" name="update" value="update">Update</button>
                                    <?php } else {?>
                                        <button type="submit" class="btn btn-success" name="add" value="add">Submit</button>
                                    <?php }?>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $("#UID").val($("#UID option:eq(1)").val());
</script>

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
