<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Songs</h3>
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
                    <h2>Songs List</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Composer</th>
                                <th>Writer</th>
                                <th>Director</th>
                                <th>Song Status</th>
                                <th>Synopsis</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($songs_data as $song) { ?>
                                <tr song_id="<?php echo $song['ID']; ?>">
                                    <td>
                                        <a href="<?php echo site_url('Songs/update/'.$song['ID']);?>" class="view_song"><i class="fa fa-eye"></i></a>                            
                                        <a href="<?php echo site_url('Songs/delete/'.$song['ID']);?>" class="view_song"><i class="fa fa-trash-o"></i></a>                                
                                    </td>
                                    <td><?php echo isset($song['Image']) && $song['Image'] != '' ? $song['Image'] : 'N/A' ?></td>
                                    <td><?php echo isset($song['Song_Title']) && $song['Song_Title'] != '' ? $song['Song_Title'] : 'N/A' ?></td>
                                    <td><?php echo isset($song['composer']) && $song['composer'] != '' ? $song['composer'] : 'N/A' ?></td>
                                    <td><?php echo isset($song['Writers']) && $song['Writers'] != '' ? $song['Writers'] : 'N/A' ?></td>
                                    <td><?php echo isset($song['director']) && $song['director'] != '' ? $song['director'] : 'N/A' ?></td>
                                    <td><input type="checkbox" value="1" name="melody" class="js-switch" <?php echo isset($song['Song_status']) && $song['Song_status'] != 0 ? 'checked' : '' ?>><p name="s_status"><?php echo isset($song['Song_status']) && $song['Song_status'] != 0 ? 'Published' : 'Unpublished' ?></p></td>
                                    <td><?php echo isset($song['synopsis']) && $song['synopsis'] != '' ? $song['synopsis'] : 'N/A' ?></td>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade view_modal" id="song_view_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Song Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="song_add_form" method="post" action="<?php echo site_url('Songs/add') ?>" data-parsley-validate class="form-horizontal form-label-left">

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Song Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="song_name" name="song_name" required="required" class="form-control col-md-7 col-xs-12">
                            <input type="hidden" id="song_id" name="song_id" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="song_composere">Composer
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="song_composer" name="song_composer"  class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="song_lyrics_writer">Lyrics Writer
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="song_lyrics_writer" name="song_lyrics_writer"  class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="song_genre">Genre 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="song_genre" name="song_genre" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Song Owner</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div id="gender" class="btn-group" data-toggle="buttons">
                                <label class="btn btn-default active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                    <input type="radio" name="song_owner" value="1"> &nbsp; IML &nbsp;
                                </label>
                                <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                    <input type="radio" name="song_owner" value="2"> Other
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="song_album">Song Album
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="song_album" name="song_album" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="song_film">Song Film 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="song_film" name="song_film" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="song_price">Song Cost
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="song_price" name="song_price" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">

                            <div class="">
                                <label>
                                    <input type="checkbox" value="1" name="song_melody_status" id="song_melody_status" class="js-switch" /> Melody
                                </label>
                            </div>
                            <div class="">
                                <label>
                                    <input type="checkbox" value="1" name="song_lyrics_status" id="song_lyrics_status"  class="js-switch" /> Lyrics
                                </label>
                            </div>
                            <div class="">
                                <label>
                                    <input type="checkbox" value="1" name="song_arrangment_status" id="song_arrangment_status" class="js-switch" /> Arrangement
                                </label>
                            </div>
                            <div class="">
                                <label>
                                    <input type="checkbox" value="1" name="song_dub_status" id="song_dub_status" class="js-switch" /> Dubbing
                                </label>
                            </div>

                        </div>
                    </div>
                    <div class="ln_solid">
                        
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {
        $('.view_song').click(function (e) {
            e.preventDefault();
//       console.log($(this).parent().parent());
            var song_id = $(this).parent().parent().attr('song_id');
            var data = {'song_id': song_id};
            $.ajax({
                url: '<?php echo site_url('Songs/get'); ?>',
                type: 'post',
                data: data,
                success: function (result) {
                    var jsonstr = result.replace('\\', '');
                    var obj = $.parseJSON(jsonstr);
                    if (obj.success) {
                        $('#song_id').val(obj.song_details.song_id);
                        $('#song_composer').val(obj.song_details.song_composer);
                        $('#song_name').val(obj.song_details.song_name);
                        $('#song_lyrics_writer').val(obj.song_details.song_lyrics_writer);
                        $('#song_genre').val(obj.song_details.song_genre);
                        $('#song_album').val(obj.song_details.song_album);
                        $('#song_film').val(obj.song_details.song_film);
                        $('#song_price').val(obj.song_details.song_price);
                        $("input[name='song_owner'][value='" + obj.song_details.song_owner + "']").prop('checked', true);
                        if (obj.song_details.song_melody_status == '1')
                            $("input[name='song_melody_status']").attr('checked', true);
                        if (obj.song_details.song_lyrics_status == '1') {
                            console.log('check');
                            $("#song_lyrics_status").attr('checked', true);
                        } else {
                            console.log('uncheck');
                        }
                        if (obj.song_details.song_arrangment_status == '1')
                            $("#song_arrangment_status").attr('checked', true);
                        if (obj.song_details.song_dub_status == '1')
                            $("#song_dub_status").attr('checked', true);
                        $('.view_modal').modal('show');

                    } else {
                    }
                    console.log(obj);

                }
            });
        });
    });
    $('input[name=melody]').change(function() {
        if($(this).is(":checked")) {
            $(this).parent().find('p').text('Published');
        } else {
            $(this).parent().find('p').text('Unpublished');
        }        
    });
    
    $('.view_song').on('click', function() {
        var song_id = $(this).parent().parent().$('#song_id').val();
        var url = window.location.hostname;
        window.location.replace(url+"imlcom/index.php/Songs/update/");
    });
    
    

</script>



