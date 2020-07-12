<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title><?php echo $title;?></title>

    <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url();?>assets/dist/css/bootstrap.css" rel="stylesheet">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
<link href="<?php echo base_url();?>assets/dist/css/login.css" rel="stylesheet">

  </head>
  <body class="text-center">
      <form class="form-signin" method="post">
          <h1 class="display-4 "><a class="text-decoration-none" href="<?php echo base_url();?>">FoodShala</a></h1>
          <!-- shows success message after sign up  -->
          <?php 
          $suc_msg = $this->session->flashdata('su_msg');
          echo '<p style="color:green;">'.$suc_msg.'</p>'; ?>
          <!-- shows error message when login -->
          <?php echo '<p style="color:red;">'.$err_msg.'</p>';  ?>
  <h1 class="h3 mb-3 font-weight-normal">Log in</h1>
  <label for="inputEmail" class="sr-only">Email</label>
  <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
 
  <button class="btn btn-lg btn-primary btn-block"  name="submit" type="submit">Sign in</button>
  <p class="mt-5 mb-3 text-muted">New to FoodShala?<a type="button" class="btn btn-link" href="<?php echo $linkSignupCustomer;?>">Create Account</a></p>
</form>
</body>
</html>
