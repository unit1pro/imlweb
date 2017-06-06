<section >
    <div class="">
        <div class="">

            <div class="box">

                <div class="col-sm-12">
                    
                    <div class="col-sm-offset-2 col-sm-8">
                        <div class="contact-form">
                            <h3>Submit your profile:</h3>
                            <?php if($result != ''){ ?>
                            <div class="submit_message" style="display: block;
    padding: 10px;
    background: #757272;
    color: #fff;
    border-radius: 10px;
    box-shadow: rgba(0, 0, 0, 0.73) 2px 2px 2px;
    text-align: center;"><?php echo $result; ?></div>
                            <?php } s?>
                            <form class="" method="post" action="<?php echo site_url('SingWithUs/insert_data') ?>" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="text" name="name" placeholder="Name: " class="form-input form-control">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="email" placeholder="Email: " class="form-input form-control">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="phone" placeholder="Phone: " class="form-input form-control">
                                </div>
                                <div class="form-group">
                                    <input type="file" name="attachment" placeholder="Attach you song" class="form-input form-control">
                                    <span class='placeholderText'>Attach your song</span>
                                </div>
                                <div class="form-group">
                                    <textarea name="message" class="form-input form-control" rows="3" placeholder="Message: "></textarea>
                                </div>
                                
                                
                                <div class="form-group">
                                    <button class="btn form-button">Send</button>
                                </div>




                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <div class="clear"></div>
            <!-- <div class="">
                                                    <div id="map"></div>
                                            </div> -->

        </div>	
    </div>
</section>