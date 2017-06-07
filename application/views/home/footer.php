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
                    console.log(data);
                    $.ajax({
                        'url': 'sendMail.php',
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
        </script>
    </body>
</html>