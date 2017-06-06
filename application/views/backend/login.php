<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ANRM | Login </title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url(); ?>/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url(); ?>/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <!--<a class="hiddenanchor" id="signup"></a>-->
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
              <form method="post" action="<?php echo site_url('user/login') ?>">
              <h1>Login Form</h1>
              <div>
                  <input type="text" class="form-control" name="UserName" placeholder="Username" required="" />
              </div>
              <div>
                  <input type="password" class="form-control" name="Password" placeholder="Password" required="" />
              </div>
              <div>
                  <button type="submit" class="btn btn-default submit" href="index.html">Log in</button>
                <!--<a class="reset_pass" href="#">Lost your password?</a>-->
              </div>

              <div class="clearfix"></div>


            </form>
          </section>
        </div>

        
      </div>
    </div>
  </body>
</html>
