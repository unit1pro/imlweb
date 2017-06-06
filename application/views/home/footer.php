
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

//        $(window).scroll(function(){
//             var sticky = $('.sticky'),
//      scroll = $(window).scrollTop();
//
//  if (scroll >= 100) sticky.addClass('fixed');
//  else sticky.removeClass('fixed');
//          });



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
        </script>
    </body>
</html>