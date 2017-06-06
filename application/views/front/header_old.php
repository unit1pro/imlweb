<!DOCTYPE html>
<html>
    <head>
        <title>Indian Music Lab</title>
        <link rel="icon" type="image/png" href="<?php echo base_url() . "front/img/logo-red.png"; ?>" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo base_url() ?>front/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url() ?>front/font-awesome/css/font-awesome.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>front/css/style.css" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url() ?>front/css/flex.css" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>front/css/login.css">
        
        <script src="<?php echo base_url() ?>front/js/jquery.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>front/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>front/js/public.js" type="text/javascript"></script>
    </head>
    <body id="page-top" class="index">
        <div class="bg-image">
            <div class="container">
                <!-- Header -->
                <header>

                    <div class="layout-row header-wrapper">
                        <div class="flex-15 flex-xs-10">
                            <a href="<?php echo site_url() ?>"><img src="<?php echo base_url() ?>front/img/logo-white.png" alt="logo" height="76"/></a>
                        </div>
                        <div class="flex-70 flex-xs-60 layout-align-center-end layout-row">
                            <a href="<?php echo site_url() ?>"><img src="<?php echo base_url() ?>front/img/title.png" alt="tile"/></a>
                        </div>
                        <div class=" flex-15 flex-xs-30 layout-align-end-start link-wrapper">

                            <?php
                            if (isset($user_data[0]['UID'])) {
                                $userImageHeader = isset($user_data) && $user_data[0]['Photo'] != '' ? base_url('uploads/images') . '/' . $user_data[0]['Photo'] : base_url('front') . '/img/user-image.png';
                                ?>
                                <div class="layout-row">
                                    <a href="<?php echo site_url('User/profile/' . $user_data[0]['UID']) ?>">
                                        <img src="<?php echo $userImageHeader; ?>" height="20"/>
                                        <span style="color: #ff0000"><?php echo $user_data[0]['FirstName'] . ' ' . $user_data[0]['LastName'] ?></span>
                                    </a>
                                </div>
                                <div class="layout-row">
                                    <a href="<?php echo site_url('User/logoutFront') ?>" style="color: #ff0000;padding-left: 10px;"><i class="fa fa-ban"></i> <span style="padding-left: 10px;">Logout</span></a>
                                </div>
                            <?php } ?>

                            <?php
                            if (!isset($user_data[0]['UID'])) {
                                $userImageHeader = base_url('front') . '/img/user-image.png';
                                ?>
                                <div class="layout-row">
                                    <img src="<?php echo $userImageHeader; ?>" height="20"/>
                                    <p style="color:white">Welcome Guest</p>
                                </div>
                                <div class="layout-row">
                                    <i class="fa fa-sign-in"></i> <span data-toggle="modal" data-target="#loginModal" style="padding-left: 10px;"><p style="color:white">Login</p></span>
                                </div>
                            <?php } ?>
                        </div>
                    </div> 
                </header>

                <div id="loginModal" class="modal fade" role="dialog">
                    <div class="form">
                    <h1>Indian Music Lab</h1>

                        <ul class="tab-group">
                            <li class="tab "><a href="#signup" class="signup-front">Sign Up</a></li>
                            <li class="tab active"><a href="#login" class="login-front">Log In</a></li>
                        </ul>

                        <div class="tab-content">
                            
                            <div id="login">
                                <form action="<?php echo base_url().'index.php/User/login_front';?>" method="post">

                                    <div class="field-wrap">
                                        <input type="text" placeholder="Enter Username" name="UserName" required autocomplete="off"/>
                                    </div>

                                    <div class="field-wrap">
                                        <input type="password" placeholder="Password" name="Password" required autocomplete="off"/>
                                    </div>

                                    <p class="forgot"><a href="#">Forgot Password?</a></p>

                                    <button class="button button-block"/>Log In</button>

                                </form>

                            </div>
                            
                            <div id="signup">   

                                <form action="<?php echo base_url().'index.php/User/signup_front';?>" method="post">

                                    <div class="field-wrap">
                                        <input type="text" placeholder="Enter Username" name="UserName" required autocomplete="off"/>
                                    </div>
                                    
                                    <div class="top-row">
                                        <div class="field-wrap">
                                            <input type="text" placeholder="First Name" name="firstName" required autocomplete="off" />
                                        </div>

                                        <div class="field-wrap">
                                            <input type="text" placeholder="Last Name" name="lastName" required autocomplete="off"/>
                                        </div>
                                    </div>

                                    <div class="field-wrap">
                                        <input type="email" placeholder="Email Address" name="email" required autocomplete="off"/>
                                    </div>

                                    <div class="field-wrap">
                                        <input type="password" placeholder="Set A Password" name="password" required autocomplete="off"/>
                                    </div>
                                    
                                    <div class="field-wrap">
                                        <input type="password" placeholder="Confirm Password" name="conf_password" required autocomplete="off"/>
                                    </div>

                                    <button type="submit" class="button button-block"/>Get Started</button>

                                </form>

                            </div>

                            

                        </div><!-- tab-content -->

                    </div> <!-- /form -->
                </div>
                
<script>
    $('.tab a').on('click', function (e) {
        e.preventDefault();

        $(this).parent().addClass('active');
        $(this).parent().siblings().removeClass('active');

        target = $(this).attr('href');

        $('.tab-content > div').not(target).hide();

        $(target).fadeIn(600);

    });
</script>