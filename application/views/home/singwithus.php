<section >
    <div class="">
        <div class="">

            <div class="box">

                <div class="col-sm-12">
                    
                    <div class="col-sm-offset-2 col-sm-8">
                        <div class="contact-form">
                            <h3>Submit your profile:</h3>
                            <?php if($result != ''){ ?>
                            <div class="submit_message" style="display: block;padding: 10px;background: #757272;color: #fff;border-radius: 10px;
                                box-shadow: rgba(0, 0, 0, 0.73) 2px 2px 2px;text-align: center;"><?php echo $result; ?></div>
                            <?php } ?>
                            <form id="singWithUsForm" name="singWithUsForm" class="" method="post" action="<?php echo site_url('SingWithUs/insert_data') ?>" enctype="multipart/form-data">
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
                                    <span class='placeholderText'><p>Attach your song</p></span>
                                </div>

                                <div class="form-group">
                                    <textarea name="message" class="form-input form-control" rows="3" placeholder="Message: "></textarea>
                                </div>
                                
                                <div class="form-group">
                                    <button type="submit" class="btn form-button">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clear"></div>
        </div>	
    </div>
</section>

<script type="text/javascript">
    $( "#singWithUsForm" ).submit(function( event ) {
      event.preventDefault();
      var a=document.forms["singWithUsForm"]["name"].value;
      var b=document.forms["singWithUsForm"]["email"].value;
      var c=document.forms["singWithUsForm"]["phone"].value;
      var d=document.forms["singWithUsForm"]["attachment"].value;
      var e=document.forms["singWithUsForm"]["message"].value;
      if (a==null || a=="",b==null || b=="",c==null || c=="",d==null || d=="",e==null || e=="") {
        $('#err_msg').text('Please Enter value');
          $('#myModal').modal('show');
      }else{
          $( "#singWithUsForm" ).submit();
      }
  });
</script>>