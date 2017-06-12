<html>
    <head>
        <title>Indian Music Lab</title>
        <link rel="icon" type="image/png" href="<?php echo base_url() ?>front/images/logo-red.png">
        <!--<link rel="stylesheet" href="<?php echo base_url() ?>front/assets/plugins/bootstrap/css/bootstrap.min.css">-->
        <link href="<?php echo base_url() ?>front/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>front/css/fonts.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>front/css/global.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url() ?>front/assets/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>front/css/login.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/vendors/nefty_popup/dist/jquery.niftymodals.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <style>

        </style>
        
    </head>
    <body>
        <div class="wrapper">
            <div class="fixed">
            <header class="header">
                
                <div class="col-xs-12 col-md-3 col-md-offset-3 col-sm-offset-3 logo-container" style="">
                    <img src="<?php echo base_url() ?>front/images/IML_logo.svg" class="logo"/>
                </div>
                <div class="col-xs-12 col-md-3 col-sm-3 social_icons_container">
                    <ul class="nav justify-content-center" style="float:right">
                        <li class="nav-item">
                            <a class="nav-link" href="#" target="__blank" title="Play Store"><img src="<?php echo base_url() ?>front/images/google_play.png" class="social_icons"/></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" target="__blank" title="App Store"><img src="<?php echo base_url() ?>front/images/app_store.png" class="social_icons"/></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.facebook.com/Indian-Music-Lab-1834930703423715/" target="__blank" title="Facebook"><img src="<?php echo base_url() ?>front/images/facebook-icon.png" class="social_icons"/></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.youtube.com/channel/UCNpE8wPDEOYt48yyhAqSjHg" target="__blank" title="Youtube"><img src="<?php echo base_url() ?>front/images/youtube.png" class="social_icons"/></a>
                        </li>
                         <li class="nav-item">
                             <a class="nav-link" href="https://twitter.com/indianmusiclab" target="__blank" title="Tweeter"><img src="<?php echo base_url() ?>front/images/twitter.png" class="social_icons"/></a>
                        </li>
                         <li class="nav-item">
                             <a class="nav-link" href="https://www.instagram.com/indianmusiclab/" target="__blank" title="Instagram"><img src="<?php echo base_url() ?>front/images/instagram-logo.png" class="social_icons"/></a>
                        </li>
                         <li class="nav-item">
                             <a class="nav-link" href="http://www.linkedin.com/company/indianmusiclab" target="__blank" title="LinkedIn"><img src="<?php echo base_url() ?>front/images/linkedin-icon-logo.png" class="social_icons"/></a>
                        </li>
                    </ul>
                </div>
                <div class="col-xs-12 col-md-2">
                    <?php
                    if (isset($user_data[0]['UID'])) {
                        $userImageHeader = isset($user_data) && $user_data[0]['Photo'] != '' ? base_url('uploads/images') . '/' . $user_data[0]['Photo'] : base_url('front') . '/images/user-image.png';
                        ?>
                        <ul class="userDetails">
                            <li><a href="<?php echo site_url('User/profile/' . $user_data[0]['UID']) ?>"><img src="<?php echo $userImageHeader; ?>" class="profilePic"></a></li>
                            <li>
                                <span><?php echo $user_data[0]['FirstName']?></span>
                                <div class="clear"></div>
                                <a href="<?php echo site_url('User/logoutFront') ?>">Sign Out</a>
                            </li>
                        </ul>
                    <?php } ?>

                    <?php
                    if (!isset($user_data[0]['UID'])) {
                        $userImageHeader = base_url('front') . '/images/user-image.png';
                        ?>
                        <ul class="userDetails">
                            <li><img src="<?php echo $userImageHeader; ?>" class="profilePic"></li>
                            <li>
                                <span>Welcome</span>
                                <div class="clear"></div>
                                <a href="#" data-modal="modal-11" class="views">Login</a>
                            </li>
                        </ul>
                    <?php } ?>
                </div>
                

            </header>
            </div>
            <div class="md-container md-effect-12" id="modal-11">
                <div class="md-content post_views_container" >
                    <div class="form">
                        <h1>Indian Music Lab</h1>

                        <ul class="tab-group">
                            <li class="tab "><a href="#signup" class="signup-front">Sign Up</a></li>
                            <li class="tab active"><a href="#login" class="login-front">Log In</a></li>
                        </ul>

                        <div class="tab-content">

                            <div id="login">
                                <form id="login_form" action="<?php echo base_url() . 'index.php/User/login_front?uri=' . uri_string(); ?>" method="post" onsubmit="return validateLogin();">

                                    <div class="field-wrap">
                                        <input type="text" placeholder="Enter Username" name="UserName" id="loginUserName" autocomplete="off"/>
                                    </div>

                                    <div class="field-wrap">
                                        <input type="password" placeholder="Password" name="Password" id="loginPassword" autocomplete="off"/>
                                    </div>

                                    <p class="forgot"><a href="#">Forgot Password?</a></p>

                                    <button type="submit" class="button button-block"/>Log In</button>

                                </form>

                            </div>

                            <div id="signup">   

                                <form id="signUpForn" action="<?php echo base_url() . 'index.php/User/signup_front?uri=' . uri_string(); ?>" method="post" onsubmit="return validateSignUp();">

                                    <div class="field-wrap">
                                        <input type="text" placeholder="Enter Username" name="UserName" id="registerUsername" required autocomplete="off"/>
                                    </div>

                                    <div class="top-row">
                                        <div class="field-wrap">
                                            <input type="text" placeholder="First Name" name="firstName"  required autocomplete="off" />
                                        </div>

                                        <div class="field-wrap">
                                            <input type="text" placeholder="Last Name" name="lastName"  required autocomplete="off"/>
                                        </div>
                                    </div>

                                    <div class="field-wrap">
                                        <input type="email" placeholder="Email Address" name="Email" id="registerEmail"  required autocomplete="off"/>
                                    </div>

                                    <div class="field-wrap">
                                        <input type="password" placeholder="Set A Password" name="password"  required autocomplete="off"/>
                                    </div>

                                    <div class="field-wrap">
                                        <input type="password" placeholder="Confirm Password" name="conf_password"  required autocomplete="off"/>
                                    </div>

                                    <button type="submit" class="button button-block"/>Get Started</button>

                                </form>

                            </div>



                        </div><!-- tab-content -->

                    </div> <!-- /form -->
                </div>
            </div>

        <div class="container">
            <div class="row col-sm-12 main-menu-section">
                <!--<div class="main-menu-items col-md-1 col-sm-3"></div>-->
                <div class="main-menu-items col-sm-2"><a href="<?php echo site_url(); ?>">Home</a></div>
                <div class="main-menu-items col-sm-2"><a href="<?php echo site_url('About'); ?>">About Us</a></div>
                <div class="main-menu-items col-sm-2"><a href="<?php echo site_url('Community'); ?>">Community</a></div> 
                <div class="main-menu-items col-sm-2" ><a href="<?php echo site_url('SingWithUs'); ?>">Sing With Us</a></div> 
                <div class="main-menu-items col-sm-2"><a href="<?php echo site_url('Contact'); ?>">Contact </a></div>

            </div>