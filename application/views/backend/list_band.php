<?php ?>

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Add Band Members</h3>
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
                        <h2>Add Band Member</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a>
                            </li>
                            <!--                      <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                    <ul class="dropdown-menu" role="menu">
                                                      <li><a href="#">Settings 1</a>
                                                      </li>
                                                      <li><a href="#">Settings 2</a>
                                                      </li>
                                                    </ul>
                                                  </li>-->
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" style="display: none;">
                        <br />
                        <form id="song_add_form" method="post" action="<?php echo site_url('Band/add') ?>" data-parsley-validate class="form-horizontal form-label-left">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="band_member_name"> Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="band_member_name" name="band_member_name" required="required" class="form-control col-md-7 col-xs-12">
                                    <input type="hidden" id="band_member_id" name="band_member_id" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="band_member_age">Age
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="band_member_age" name="band_member_age"  class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="band_member_instrument">Instrument
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="band_member_instrument" name="band_member_instrument"  class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="band_member_phone">Phone No. 
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="band_member_phone" name="band_member_phone" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="band_member_email_id">Email
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="band_member_email_id" name="band_member_email_id" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="band_member_address">Address 
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea type="text" id="band_member_address" name="band_member_address" class="form-control col-md-7 col-xs-12"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="band_member_price"> Cost
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="band_member_price" name="band_member_price" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary">Cancel</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Band Member List</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <!--                        <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li><a href="#">Settings 1</a>
                                                            </li>
                                                            <li><a href="#">Settings 2</a>
                                                            </li>
                                                        </ul>
                                                    </li>-->
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
    <!--                    <p class="text-muted font-13 m-b-30">
                            DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>
                        </p>-->
                        <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Instrument</th>
                                    <th>Phone No.</th>
                                    <th>Email</th>
                                    <th>Cost</th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php 
                                if(isset($band_data)){
                                foreach ($band_data as $band) { ?>


                                    <tr band_member_id="<?php echo $band['band_member_id']; ?>">
                                        <td><a href="javascript:void(0)" class="view_artist"><i class="fa fa-eye"></i></a></td>
                                        <td><?php echo isset($band['band_member_name']) && $band['band_member_name'] != '' ? $band['band_member_name'] : 'N/A' ?></td>
                                        <td><?php echo isset($band['band_member_instrument']) && $band['band_member_instrument'] != '' ? $band['band_member_instrument'] : 'N/A' ?></td>
                                        <td><?php echo isset($band['band_member_phone']) && $band['band_member_phone'] != '' ? $band['band_member_phone'] : 'N/A' ?></td>
                                        <td><?php echo isset($band['band_member_email_id']) && $band['band_member_email_id'] != '' ? $band['band_member_email_id'] : 'N/A' ?></td>
                                        <td><?php echo isset($band['band_member_price']) && $band['band_member_price'] != '' ? $band['band_member_price'] : 'N/A' ?></td>

                                    </tr>

                                <?php } 
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Artist</h3>
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
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Artist List</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <!--                        <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a href="#">Settings 1</a>
                                                        </li>
                                                        <li><a href="#">Settings 2</a>
                                                        </li>
                                                    </ul>
                                                </li>-->
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
<!--                    <p class="text-muted font-13 m-b-30">
                        DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>
                    </p>-->
                    <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Phone No.</th>
                                <th>Email</th>
                                <th>City</th>
                                <th>Cost</th>
                                <!--<th>Dubbing</th>-->
                            </tr>
                        </thead>


                        <tbody>
                            <?php 
                            if(isset($band_data)){
                            foreach ($band_data as $band) { ?>


                                <tr band_member_id="<?php echo $band['band_member_id']; ?>">
                                    <td><a href="javascript:void(0)" class="view_artist"><i class="fa fa-eye"></i></a></td>
                                    <td><?php echo isset($band['band_member_name']) && $band['band_member_name'] != '' ? $band['band_member_name'] : 'N/A' ?></td>
                                    <td><?php echo isset($band['band_member_age']) && $band['band_member_age'] != '' ? $band['band_member_age'] : 'N/A' ?></td>
                                    <td><?php echo isset($band['band_member_phone']) && $band['band_member_phone'] != '' ? $band['band_member_phone'] : 'N/A' ?></td>
                                    <td><?php echo isset($band['band_member_email_id']) && $band['band_member_email_id'] != '' ? $band['band_member_email_id'] : 'N/A' ?></td>
                                    <td><?php echo isset($band['artist_city']) && $band['artist_city'] != '' ? $band['artist_city'] : 'N/A' ?></td>
                                    <td><?php echo isset($band['band_member_price']) && $band['band_member_price'] != '' ? $band['band_member_price'] : 'N/A' ?></td>

                                </tr>

                            <?php } 
                            } 
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade view_modal" id="view_artist_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Artist Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="modal_form" method="post" action="<?php echo site_url('Artist/add') ?>" data-parsley-validate class="form-horizontal form-label-left">

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Artist Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="band_member_name" name="band_member_name" required="required" class="form-control col-md-7 col-xs-12">
                            <input type="hidden" id="band_member_id" name="band_member_id" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="band_member_age">Age
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="band_member_age" name="band_member_age"  class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="band_member_instrument">Genre
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="band_member_instrument" name="band_member_instrument"  class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="band_member_phone">Phone No. 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="band_member_phone" name="band_member_phone" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="band_member_email_id">Email
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="band_member_email_id" name="band_member_email_id" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="band_member_address">Address 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea type="text" id="band_member_address" name="band_member_address" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="band_member_price">Cost
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="band_member_price" name="band_member_price" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save_modal_form">Save changes</button>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {
        $('.view_artist').click(function (e) {
            e.preventDefault();
//       console.log($(this).parent().parent());
            var band_member_id = $(this).parent().parent().attr('band_member_id');
            console.log(band_member_id);
            var data = {'band_member_id': band_member_id};
            $.ajax({
                url: '<?php echo site_url('Artist/get'); ?>',
                type: 'post',
                data: data,
                success: function (result) {
                    var jsonstr = result.replace('\\', '');
                    var obj = $.parseJSON(jsonstr);
                    if (obj.success) {
                        $('#band_member_id').val(obj.artist_details.band_member_id);
                        $('#band_member_name').val(obj.artist_details.band_member_name);
                        $('#band_member_age').val(obj.artist_details.band_member_age);
                        $('#band_member_instrument').val(obj.artist_details.band_member_instrument);
                        $('#band_member_phone').val(obj.artist_details.band_member_phone);
                        $('#band_member_email_id').val(obj.artist_details.band_member_email_id);
                        $('#band_member_address').text(obj.artist_details.band_member_address);
                        $('#band_member_price').val(obj.artist_details.band_member_price);

                        $('#view_artist_modal').modal('show');

                    } else {
                    }
                    console.log(obj);

                }
            });
        });
        $("#save_modal_form").click(function () {
            $('#modal_form').submit();
        });

    });

</script>



