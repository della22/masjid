<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url('assets/nprogress/nprogress.css') ?>" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url('assets/animate.css/animate.min.css') ?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('css/custom.min.css') ?>" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <img src="<?php echo base_url('images/logo.png') ?>" height="150" width="150"  /> 
            <form action="<?= site_url('login') ?>" method="POST">

              <h1>Login Form</h1>
              <div class="col-md-12 col-sm-12">
                <input type="text" class="form-control" placeholder="Username" name="username" required />
              </div>
              <div class="col-md-12 col-sm-12">
                <input type="password" class="form-control" placeholder="Password" name="password" required />
              </div>
              <div align="center" class="col-md-12 col-sm-12">
                <input type="submit" class="btn btn-success" value="Login" style="float: none !important; margin-left: 0px !important" />
              </div>

              <div class="clearfix"></div>

              
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
