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
   
   <link href="<?php echo base_url();?>assets/dist/css/pricing.css" rel="stylesheet">
  </head>
   <?php $logged_in = $this->session->userdata('logged_in');?>
  
  
   <!-- Custom styles for this template -->
  <body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal"   ><a class="p-2 text-dark" href="<?php echo base_url();?>">FoodShala</a></h5>
  <nav class="my-2 my-md-0 mr-md-3">
    
   <?php if ($logged_in == true) {?>
    <p class="p-2 text-dark">Hi <?php echo $this->session->userdata()['customer_name']?> !</p>
  </nav>
  <a class="btn btn-outline-primary" href="<?php echo $linkLogOutCustomer;?>">Sign Out</a>
<?php }else{?>
    <a class="p-2 text-dark" href="<?php echo $linkLoginCustomer;?>">Log in</a>
  </nav>
  <a class="btn btn-outline-primary" href="<?php echo $linkSignupCustomer;?>">Sign up</a>

<?php }?>
</div>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <h1 class="display-4">Hungry!</h1>
    

  <p class="lead">Let's find out what you are craving for !!!!</p>
</div>

<div class="container">
  <div class="card-deck mb-3 text-center">
   

    <?php if($AllRestaurentDetails){?>
      <?php foreach($AllRestaurentDetails as $key => $value):?>
    
      <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal"><?php echo $value['restaurent_name'];?></h4>
      </div>
      <div class="card-body">
        <ul class="list-unstyled mt-3 mb-4">
          <li><?php echo $value['city'];?> , <?php echo $value['pin_code'];?></li>
          <li><?php echo $value['timing'];?></li>
        </ul>
        <a type="button" class="btn btn-lg btn-block btn-outline-primary"  href="<?php echo $ViewRestaurentInfo.'/'.$value['restaurent_code'];?>">View Restaurent</a>
      </div>
    </div>
      <?php endforeach;?>
    <?php }else{?>
       <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">No Restaurent</h4>
      </div>
      <div class="card-body">
        <ul class="list-unstyled mt-3 mb-4">
          <li>Not Available Now</li>
          <li>Please visit later.</li>
        </ul>
        <button type="button" class="btn btn-lg btn-block btn-outline-primary">View Restaurent</button>
      </div>
    </div>
    <?php }?>

  </div>

<footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
      <div class="col-12 col-md">
        <h5>FoodShala</h5>
        <small class="d-block mb-3 text-muted">&copy; 2009-2020</small>
      </div>
      <div class="col-6 col-md">
        <h5>Explore</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="#">Code of Conduct</a></li>
          <li><a class="text-muted" href="#">Developers</a></li>
          <li><a class="text-muted" href="#">Community</a></li>
          
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>For Restaurents</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="<?php echo $linkRegisterRestaurent;?>">Register Restaurent</a></li>
          <li><a class="text-muted" href="<?php echo $linkLoginRestaurent;?>">Login Restaurent</a></li>
          <li><a class="text-muted" href="#">Restaurent Guides</a></li>
          <li><a class="text-muted" href="#">Registration Status</a></li>
          <li><a class="text-muted" href="#">Products </a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>Company</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="#">About</a></li>
          <li><a class="text-muted" href="#">Team</a></li>
          <li><a class="text-muted" href="#">Careers</a></li>
          <li><a class="text-muted" href="#">Privacy</a></li>
          <li><a class="text-muted" href="#">Terms</a></li>
        </ul>
      </div>
    </div>
  </footer>
  </div>
</body>
</html>
