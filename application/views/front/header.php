<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Indian Music Lab</title>
        <link rel="icon" type="image/png" href="<?php echo base_url() ?>front/images/logo-red.png">

        <meta property="fb:app_id" content="113869198637480">
        <meta property="og:site_name" content="Facebook for Developers">
        <meta property="og:title" content="Facebook Developer Documentation - Facebook for Developers">
        <meta property="og:type" content="website">

        <!-- Bootstrap -->
        <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="<?php echo base_url() ?>front/css/style.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>front/css/fonts.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>front/css/global.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>front/css/mediaquery.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url() ?>front/font-awesome/css/font-awesome.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>front/css/login.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/vendors/nefty_popup/dist/jquery.niftymodals.css" /> 
        <style>
            #actions{margin:0}
            div.table{display:table}
            div.table .file-row{display:table-row}
            div.table .file-row > div{display:table-cell;vertical-align:top;border-top:1px solid #ddd;padding:8px}
            div.table .file-row:nth-child(odd){background:#f9f9f9}
            #total-progress{opacity:0;transition:opacity .3s linear}
            #previews .file-row.dz-success .progress{opacity:0;transition:opacity .3s linear}
            #previews .file-row .delete{display:none}
            #previews .file-row.dz-success .start,#previews .file-row.dz-success .cancel{display:none}
            #previews .file-row.dz-success .delete{display:block}
            .post_views_container{
                margin: 100px auto;
                width: 550px;
            }
        </style>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <!--      <div class="overlay">
                    <div class="overlay-content">
                        <img src="assets/images/imlanimated.webp">
                    </div>
                </div>-->
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
                                    <span><?php echo $user_data[0]['FirstName'] ?></span>
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
                <div class="md-container md-effect-12" id="modal-11">
                    <div class="md-content post_views_container" >
                        <div class="form">
                            <h1>Indian Music Lab</h1>

                            <ul class="tab-group">
                                <li class="tab"><a href="#signup" class="signup-front">Sign Up</a></li>
                                <li class="tab active"><a href="#login" class="login-front">Log In</a></li>
                            </ul>

                            <div class="tab-content">

                                <div id="login">
                                    <form action="<?php echo base_url() . 'index.php/User/login_front?uri=' . uri_string(); ?>" method="post">

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

                                    <form action="<?php echo base_url() . 'index.php/User/signup_front?uri=' . uri_string(); ?>" method="post">

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


