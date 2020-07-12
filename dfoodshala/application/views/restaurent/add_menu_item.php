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
    <link href="dashboard.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/dist/css/dashboard.css" rel="stylesheet">

  </head>
  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Food Shala</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3 text-center" href="<?php echo $linkDashBoardRestaurent;?>">Food Shala</a>

  <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="<?php echo $linkSignOutRestaurent;?>">Sign out</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="<?php echo $linkDashBoardRestaurent;?>">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $linkViewOrdersRestaurent;?>">
              <span data-feather="file"></span>
              Orders
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $linkViewMenuRestaurent;?>">
              <span data-feather="file-text"></span>
              My Menu
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="<?php echo $linkAddMenuRestaurent;?>">
              <span data-feather="plus-square"></span>
              Add Menu
            </a>
          </li>
          
        </ul>

     

      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add Item</h1>
        
      </div>

 
        <form class="needs-validation" method="post">
        <div class="row">
          <div class="col-md-3 mb-3">
            <label for="firstName">Item name</label>
            <input name="ItemName" type="text" class="form-control" id="firstName" placeholder="" value="" required>
            <div class="invalid-feedback">
              Valid Item name is required.
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="lastName">Price</label>
            <input name="price" type="number" class="form-control" id="lastName" placeholder="" value="" required>
            <div class="invalid-feedback">
              Valid Price is required.
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="lastName">Veg</label>
             <label>
              <input type="radio" name="veg" value="1" required> Vegetarian
              <input type="radio" name="veg" value="2"> Non - Vegetarian
            </label>
            <div class="invalid-feedback">
              Valid Price is required.
            </div>
          </div>
        </div>      
        <button class="btn btn-primary btn-sm" type="submit">Add Item</button>
      </form>
  
    </main>
  </div>
</div>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        


        <script src="<?php echo base_url();?>assets/dist/js/dashboard.js"></script>


      </body>
</html>
