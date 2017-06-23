<!--<div class="overlay">
            <div class="overlay-content">
                <img src="<?php echo site_url() ?>front/assets/images/imlanimated.webp">
            </div>
        </div>-->
<section>
    <div class="">
        <div class="wrapper">
            <div class="artist-box col-sm-12" style="padding-right: 0;padding-left: 0;">
                <div class="artist-image-section col-sm-9" style="padding-right: 0;padding-left: 0;">
                    <div class="artist-image">
                        <img src="<?php echo base_url() ?>front/assets/images/shikhar.jpg" class="img-fluid img-responsive banner_image">
                        <div class="artist-name-homepage  col-sm-12" style="padding-right: 0;padding-left: 0;">
                            <!--<img src="<?php echo base_url() ?>front/assets/images/artistNameBackground.png" class="img-fluid img-responsive">-->
                            <div class="col-sm-4">
                                <h2><span>Shikhar Kumar</span></h2>
                            </div>
                            <div class="btn-container col-sm-8" style="padding-right: 10px;padding-left: 0px;">
                                <button class="btn book-btn" data-toggle="modal" data-target="#book-artist-modal">Contact Shikhar</button>
                                <a class="btn book-btn" href="https://www.facebook.com/Indian-Music-Lab-1834930703423715/" target="__blank">Be A Friend</a> 
                                <a class="btn book-btn" href="https://www.facebook.com/Indian-Music-Lab-1834930703423715/" target="__blank">Follow</a> 
                            </div>

                        </div>
                    </div>
                    <div class="artist-chanel">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/SxTYjptEzZs" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="artist-playlist-section col-sm-3" style="padding-right: 0;padding-left: 0;">
                    <ul class="plalist-list">
                        <!--<li class="playlist-heading">Playlist</li>-->
                        <li class="playlist-heading">Songs Coming Soon</li>
                        <li class="playlist-item"><a class="" href="javascript:void(0);">Ibaadat</a> 
                        <li class="playlist-item"><a class="" href="javascript:void(0);">Mannat Ka Dhaga</a> 
                        </li>
                    </ul>
                </div>



            </div>
            <div class="clearfix"></div>
            <div class="col-sm-12" style="padding-right: 0;padding-left: 0;">
                <div class="row artist-thumb">
                    <div class="col-sm-3"><a href="javascript:void(0)" class="corosal-images"><img src="<?php echo base_url() ?>front/assets/images/shikhar1.jpg" class="img-fluid img-thumbnail img-responsive"></a></div>
                    <div class="col-sm-3"><a href="javascript:void(0)" class="corosal-images"><img src="<?php echo base_url() ?>front/assets/images/shikhar2.jpg" class="img-fluid img-thumbnail img-responsive"></a></div>
                    <div class="col-sm-3"><a href="javascript:void(0)" class="corosal-images"><img src="<?php echo base_url() ?>front/assets/images/shikhar4.jpg" class="img-fluid img-thumbnail img-responsive"></a></div>
                    <div class="col-sm-3"><a href="javascript:void(0)" class="corosal-images"><img src="<?php echo base_url() ?>front/assets/images/shikhar3.jpg" class="img-fluid img-thumbnail img-responsive"></a></div>

                </div>
            </div>

        </div>
    </div>
    
    <div class="modal fade" id="book-artist-modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Contact Us To Book This Artist</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="" id="book_artist">
                        <div class="form-group">
                            <!--<label for="exampleInputPassword1">Name</label>-->
                            <input type="text" class="form-control clear_text required" id="exampleInputPassword1" name="name" placeholder="Name :">
                            <input type="hidden" name="subject" value="Book Shikhar Kumar">
                        </div>

                        <div class="form-group">
                            <!--<label for="exampleInputEmail1">Email address</label>-->
                            <input type="email" class="form-control clear_text required" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Email : ">
                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                        </div>
                        <div class="form-group">
                            <!--<label for="exampleInputEmail1">Email address</label>-->
                            <input type="email" class="form-control clear_text required" id="exampleInputEmail1" name="phone" aria-describedby="emailHelp" placeholder="Phone No :">
                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                        </div>

                        <div class="form-group">
                            <!--<label for="exampleTextarea">Message</lasbel>-->
                            <textarea class="form-control clear_text required" id="exampleTextarea" name="message" placeholder="Message : " rows="3"></textarea>
                        </div>


                    </form>
                    <button  class="btn btn-primary" onclick="sendmail(this)">Send</button>
                </div>
                <!-- <div class="modal-footer">
                  <button type="button" class="btn btn-primary">Save changes</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div> -->
            </div>
        </div>
    </div>
    <div class="modal fade" id="become-artist-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Contact Us To Book This Artist</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="http://indianmusiclab.com/sendMail.php" id="book_artist">
                        <div class="form-group">
                            <!--<label for="exampleInputPassword1">Name</label>-->
                            <input type="text" class="form-control" id="exampleInputPassword1" name="name" placeholder="Name">
                            <input type="hidden" name="subject" value="Sing With IML">
                            <input type="hidden" name="form" value="BecomeArtist">
                        </div>
                        <div class="form-group">
                            <!--<label for="exampleInputEmail1">Email address</label>-->
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                        </div>
                        <div class="form-group">
                            <!--<label for="exampleInputEmail1">Email address</label>-->
                            <input type="text" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Phone No.">
                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                        </div>


                        <div class="form-group">
                            <!--<label for="exampleTextarea">Message</lasbel>-->
                            <textarea class="form-control" id="exampleTextarea" name="message" placeholder="message" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
                            <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                        </div>

                    </form>
                    <button  class="btn btn-primary" onclick="sendmail(this)">Send</button>
                </div>
                <!-- <div class="modal-footer">
                  <button type="button" class="btn btn-primary">Save changes</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div> -->
            </div>
        </div>
    </div>
    <div class="modal fade" id="msg_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    </div>


</section>
