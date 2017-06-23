<!-- Modal content-->
<div id="errorModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content panel-danger">
      <div class="modal-header panel-heading">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 id="err_msg" class="modal-title">Modal Header</h4>
      </div>
    </div>
  </div>
</div>
<!-- Modal content End-->

</div>
</div>

<script src="<?php echo base_url() ?>front/assets/js/jquery-3.2.1.min.js" ></script>
<script src="<?php echo base_url() ?>front/js/bootstrap.min.js" ></script>
<script src="<?php echo base_url() ?>front/js/public.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>front/js/build.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>/vendors/nefty_popup/dist/jquery.niftymodals.js"></script>
<script>
//    var stickyOffset = $('.sticky').offset().top;
    $(document).ready(function () {
        var status = '<?php echo $_SESSION['login_msg']; ?>';
        if (status) {
            alert(status);
        }

        $('.views').on('click', function () {
            console.log(this);
            var modal = $(this).data('modal');
            $("#" + modal).niftyModal();
        });

        var error = '<?php echo $this->session->alert_msg;?>';
        console.log(error);
        if(error){
            $('#err_msg').text(error);
            $('#errorModal').modal('show');
        }
    });
</script> 
<script>
    // this is important for IEs
    var polyfilter_scriptpath = '<?php echo base_url(); ?>/vendors/nefty_popup/lib/js/';</script>

        <script src="<?php echo base_url(); ?>/vendors/nefty_popup/lib/js/cssParser.js"></script>
    <script src="<?php echo base_url(); ?>/vendors/nefty_popup/lib/js/css-filters-polyfill.js"></script>
        <script>
                    $('.tab a').on('click', function (e) {
                e.preventDefault();

                $(this).parent().addClass('active');
                $(this).parent().siblings().removeClass('active');

                target = $(this).attr('href');

                $('.tab-content > div').not(target).hide();

                $(target).fadeIn(600);

            });
        </script>Ï
        <script>

            $(document).ready(function () {

                $('.corosal-images').click(function () {
                    var current_image = $('.banner_image').prop('src');
                    var clicked_image = $(this).find('img').prop('src');
//                                        console.log(current_image);
//                                        console.log(clicked_image);
                    $('.banner_image').prop('src', clicked_image);
                    $(this).find('img').prop('src', current_image);
                });


                // alert($(window).width());

//                                    $('.wrapper').width($(window).width());
                var heightframe = $('.artist-image-section').height();
                var widthframe = $('.artist-image-section').width();

                $('.artist-playlist-section').height(heightframe);
                $('.promo').click(function () {
                    $('.artist-image').slideUp();
                    $('.artist-chanel').show();
                    $('.artist-chanel iframe').attr('width', widthframe);
                    $('.artist-chanel iframe').attr('height', heightframe);
                });

                setTimeout(function () {
                    hideAnimation()
                }, 3000);

                $('form .required').click(function () {
                    console.log('hello');
                    $(this).css('border', '1px solid rgba(0,0,0,.15)');
                });
            })
            function hideAnimation() {
                // $('.overlay-content').animate(bottom:'100px');
                $('.overlay').hide('slow');
            }
            ;

            function sendmail(object) {
                var error = 0;
                $('#book_artist .required').each(function () {
                    if ($(this).val() == '') {
                        error = 1;
                        $(this).css('border', '1px solid #FF0000');
                    } else {
                        $(this).css('border', '1px solid #00FF00');
                    }
                });
                if (!error) {
                    $(object).prop('disabled', true);
                    var data = $('#book_artist').serialize();
                    $.ajax({
                        'url': "<?php echo base_url(); ?>/Index/bookArtist/",
                        'data': data,
                        'type': 'post',
                        success: function (res) {
                            $(object).prop('disabled', false);
                            console.log(res);
                            $('#book-artist-modal').modal('hide');
                            $('#book-artist-modal .clear_text').val('');
//                                            $('#book-artist-modal textarea').val('');
                            $('#msg_modal .modal-title').html(res);
                            $('#msg_modal').modal('show');

                        }
                    });
                }
                return false;
            }

            $( "input[type!='file'], textarea" ).focusout(function(event) {
              event.preventDefault();
              
              var formid = $(this).parent().parent().parent().attr('id');

              if( formid !== 'signup') {
                  var errors = 4;
                  var name = this.name;
                  var inputValue = $(this).val();
                  if(!inputValue){
                    $('#err_msg').text('Please Enter value in this field');
                    $('#errorModal').modal('show');
                    return false;
                }
                  switch(name) {
                        case 'message':
                        case 'name':
                            var letters = /^[a-z\d\-_\s]+$/i;  
                            if(inputValue.match(letters)) {
                                errors--;
                            } else  {
                                $('#err_msg').text('Please input alphanumeric characters only');
                                $('#errorModal').modal('show');
                            }  
                            break;
                        case 'email':
                            var emailPattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;  
                            if(inputValue.match(emailPattern)) {   
                                errors--;
                            } else  {
                                $('#err_msg').text('Please input valid email only');
                                $('#errorModal').modal('show');
                            }          
                            break;
                        case 'phone':
                            var phonePattern = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;  
                            if(inputValue.match(phonePattern)) {
                                errors--;
                            } else  {
                                $('#err_msg').text('Please input valid phone number only');
                                $('#errorModal').modal('show');
                            }           
                            break;
                        case 'UserName':

                    }
                  return false;
              }
            });

            $("input:file").change(function(event){
                var inputValue = $(this).val();
                if(!inputValue){
                  $('#err_msg').text('Please Enter value in this field');
                  $('#errorModal').modal('show');
                  return false;
                }
                var ext = inputValue.split('.').pop().toLowerCase();
                var size = this.files[0].size;      //1000000 = 1MB
                if($.inArray(ext, ['gif','png','jpg','jpeg','mp4','wmv','mov','avi','mp3']) == -1) {
                    $('#err_msg').text('Please input valid file');
                    $('#errorModal').modal('show');
                } else if (size > 10000000) {
                     $('#err_msg').text('Please select smaller size file.');
                     $('#errorModal').modal('show');
                } 
                return false;
            });

            function validateLogin() {
                var username = $("#loginUserName").val();
                if( username === '' ) {
                    $("#loginUserName").append('<p>Please Provide Username.</p>');
                    $("#loginUserName").css('border-color','#ff0000');
                    return false;
                } else {
                    $("#loginUserName").css('border-color','#ffffff');
                }
                
                var password = $("#loginPassword").val();
                if( password === '' ) {
                    $("#loginPassword").append('<p>Please Provide Username.</p>');
                    $("#loginPassword").css('border-color','#ff0000');
                    return false;
                } else {
                    $("#loginPassword").css('border-color','#ffffff');
                }
                return true;
            }

            $("#signup input").focusout(function(event){
              event.preventDefault();

              var name = this.name;
              var inputValue = $(this).val();
              if(!inputValue){
                var presence = $(this).parent().find('p');
                if(presence.length === 0){
                    $(this).css('border-color','#ff0000');
                    $(this).parent().append('<p class="text-danger">This field is mandatory!!!</p>');
                }
                return false;                    
              } else {
                $(this).parent().find('p').remove();
              }
              switch(name) {
                    case 'UserName':
                        var letters = /^[0-9a-zA-Z]+$/;  
                        if(inputValue.match(letters)) {
                            autocheck(name, inputValue, this);
                        } else  {
                            $(this).css('border-color','#ff0000');
                            $(this).parent().append('<p class="text-danger">Please input alphanumeric characters only without spaces.</p>');
                        }  
                        break;
                    case 'lastName':
                    case 'firstName':
                        var letters = /^[a-zA-Z ]*$/;  
                        if(inputValue.match(letters)) {
                            $(this).css('border-color','#1ab188');
                        } else  {
                            $(this).css('border-color','#ff0000');
                            $(this).parent().append('<p class="text-danger">Input Alphabets only</p>');
                        }  
                        break;
                    case 'Email':
                        var emailPattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;  
                        if(inputValue.match(emailPattern)) {   
                           autocheck(name, inputValue, this);
                        } else  {
                            $(this).css('border-color','#ff0000');
                            $(this).parent().append('<p class="text-danger">Invalid Email Format</p>');
                        }
                        break;
                    case 'password':
                        var passPattern = /^.{6,}$/;
                        if(inputValue.match(passPattern)) {   
                            $(this).css('border-color','#1ab188');
                        } else {
                            $(this).css('border-color','#ff0000');
                            $(this).parent().append('<p class="text-danger">Invalid Password Format</p>');
                        }
                        break;
                    case 'conf_password':
                        var passPattern = /^.{6,}$/;
                        if(inputValue.match(passPattern)) {   
                            var password = $(this).parent().parent().find("input[name='password']").val();
                            if(password == inputValue){
                                $(this).css('border-color','#1ab188');                                
                            } else {
                              $(this).css('border-color','#ff0000');
                              $(this).parent().append('<p class="text-danger">Password didn\'t matched, try again</p>');              
                            }
                        } else {
                            $(this).css('border-color','#ff0000');
                            $(this).parent().append('<p class="text-danger">Invalid Password Format</p>');
                        }
                        break;
                }
              return false;
            });

            function autocheck(name, Value, element) {

                $.ajax({
                    type: "post",
                    url: '<?php echo site_url('User/autocheck') ?>',
                    data: {'key':name, 'value':Value},
                    success: function (data) {
                        var obj = $.parseJSON(data);
                        if (obj.success === false) {
                            $(element).css('border-color','#ff0000');
                            $(element).parent().append('<p class="text-danger">'+obj.msg+'</p>');                       
                        } else {
                            $(element).css('border-color','#1ab188');
                        }
                    }
                });
                 
            }

        </script>
    </body>
</html>