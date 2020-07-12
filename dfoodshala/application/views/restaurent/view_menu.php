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
  <h4 class="text-left" ><?php echo $RestaurentDetails['restaurent_name'];?></h4>
    

  <p class="lead text-left">Let's find out what you are craving for !!!!</p>
</div>

<div class="container">
      <div class="table-responsive">
  
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Item Name</th>
              <th>Veg</th>
              <th>Price</th>
              <th>Order</th>
            </tr>
          </thead>
          <tbody>

            <?php if (!empty($RestaurentMenuItem)){?>
            
            <?php foreach ($RestaurentMenuItem as $key => $value) : ?>
            <tr>
              <td><?php echo $value['item_name']; ?></td>
              <td><?php echo $VegOrNonVeg= ($value['veg'] ==1? 'Veg': 'Non-Veg')  ?></td>
              <td><?php echo $value['price']; ?></td>
              <td>
                <a href="<?php echo $OrderItem.$value['item_code'];?>" class="btn btn-sm btn-primary btn-round" >Order</a>
              </td>
            </tr>
            <?php endforeach; ?>
           
           <?php }else{?>
                    <tr>
                        <td></td>
                        <td>No Menu Data Available.</td>
                        <td></td>
                        <td></td>
                      
                      </tr> 

                  <?php }?>
          </tbody>
        </table>
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
