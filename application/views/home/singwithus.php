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

        <!-- Modal content-->
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content panel-danger">
              <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 id="err_msg" class="modal-title">Modal Header</h4>
              </div>
            </div>
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
      if (a==null || a=="",b==null || b=="",c==null || c=="",d==null || d=="",e==null || e=="")
      {
        $('#err_msg').text('Please Enter value');
          $('#myModal').modal('show');
      }
  });

    $( "input, textarea" ).focusout(function(event) {
      event.preventDefault();
      
      var errors = 4;
      var name = this.name;
      var inputValue = $(this).val();
      if(!inputValue){
        $('#err_msg').text('Please Enter value in this field');
        $('#myModal').modal('show');
        return false;
      }
      switch(name) {
            case 'message':
            case 'name':
                var letters = /^[0-9a-zA-Z]+$/;  
                if(inputValue.match(letters)) {
                    errors--;
                } else  {
                    $('#err_msg').text('Please input alphanumeric characters only');
                    $('#myModal').modal('show');
                }  
                break;
            case 'email':
                var emailPattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;  
                if(inputValue.match(emailPattern)) {   
                    errors--;
                } else  {
                    $('#err_msg').text('Please input valid email only');
                    $('#myModal').modal('show');
                }          
                break;
            case 'phone':
                var phonePattern = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;  
                if(inputValue.match(phonePattern)) {   
                    errors--;
                } else  {
                    $('#err_msg').text('Please input valid phone number only');
                    $('#myModal').modal('show');
                }           
                break;
            case 'attachment':
                var ext = inputValue.split('.').pop().toLowerCase();
                if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
                    $('#err_msg').text('Please input valid file');
                    $('#myModal').modal('show');
                } else {
                    errors--;
                }                 
                break;
        }
      return false;
    });

</script>>