<?php
include "includes/db.php";
include "functions/functions.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>E-Commerce Store</title>

  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100">
  <link rel="stylesheet" href="styles/bootstrap.min.css">
  <link rel="stylesheet" href="font-awesome/css/fontawesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="styles/style.css" rel="stylesheet"></link>
  <!-- JQuery 3.3.1 -->
  <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  -->
  <!-- Bootstrap JS 3.3.7 -->
  <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  -->

</head>

<body>
  <!-- top starts -->
  <div id="top">
    <!-- container starts -->
    <div class="container">
      <!-- col md 6 offer starts -->
      <div class="col-md-6 offer">
        <a href="#" class="btn btn-success btn-sm"> Wellcome :Guest</a>
        <a href="#">Shopping Cart Total Price: $ 100 Total Items: 2</a>
      </div>
      <!-- col md 6 offer ends -->
      <!-- col md 6 starts -->
      <div class="col-md-6">
        <!-- menu starts -->
        <ul class="menu">
          <li>
            <a href="customer_register.php">Registation</a>
          </li>
          <li>
            <a href="checkout.php">My Account</a>
          </li>
          <li>
            <a href="cart.php">Go To Cart</a>
          </li>
          <li>
            <a href="checkout.php">Login</a>
          </li>
        </ul>
        <!-- menu ends -->
      </div>
      <!-- col md 6 ends -->
    </div>
    <!-- container ends -->
  </div>
  <!-- top ends -->
  <!-- Navbar starts -->
  <div class="navbar navbar-default" id="navbar">
    <!-- Container Starts-->
    <div class="container">
      <!-- navbar header starts -->
      <div class="navbar-header">
        <!--navbar brand home starts-->
        <a class="navbar-brand home" href="index.php">
          <img src="images/title.png" alt="title" class="hidden-xs" height="30px" width="100px">
          <img src="images/title1.png" alt="title" class="visible-xs">
        </a>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">

          <span class="sr-only">Toggle Navigation </span>

          <i class="fa fa-align-justify"></i>

        </button>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">

          <span class="sr-only">Toggle Search</span>

          <i class="fa fa-search"></i>

        </button>

      </div>
      <!--navbar header ends-->
      <!--navbar-collapse collapse starts-->
      <div id="navigation" class="collapse navbar-collapse">
        <!--padding-nav starts-->
        <div class="padding-nav">
          <!--nav navbar-nav navbar-left starts-->
          <ul class="nav navbar-nav navbar-left">
            <li>
              <a href="index.php"> Home </a>
            </li>
            <li class="active">
              <a href="shop.php"> Shop </a>
            </li>
            <li>
              <a href="checkout.php"> My Account </a>
            </li>
            <li>
              <a href="cart.php"> Shopping Cart </a>
            </li>

            <li>
              <a href="contect.php"> Contact Us </a>
            </li>
          </ul>
          <!--nav navbar-nav navbar-left ends-->
        </div>
        <!--padding-nav ends-->
        <!--btn btn-primary navbar-btn right starts-->
        <a class="btn btn-primary navbar-btn right" href="cart.php">
          <li class="fa fa-shopping-cart"></li>
          <span>4 itelms in cart</span>
        </a>
        <!--btn btn-primary navbar-btn right ends-->
        <!--navbar-collapse collapse right starts-->
        <div class="navbar-collapse collapse right">
          <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
            <span class="sr-only"> Toggle Search</span>
            <li class="fa fa-search"></li>
          </button>
        </div>
        <!--navbar-collapse collapse right ends-->
        <!--collapse clearfix starts-->
        <div id="search" class="collapse">
          <!--navbar form starts-->
          <form action="results.php" class="navbar-form" method="get">
            <!--input-group starts-->
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search" name="user_query" required>
              <span class="input-group-btn">
                <!--input group btn-->
                <button type="submit" value="Search" name="search" class="btn btn-primary">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
            <!--input-group ends-->
          </form>
          <!--navbar form ends-->
        </div>
        <!--collapse clearfix ends-->
      </div>
      <!--navbar-collapse collapse ends-->

    </div>
    <!-- Container ends-->
  </div>
  <!-- Navbar ends-->
  <div id="content">
    <div class="container">
      <div class="col-md-12">
        <ul class="breadcrumb">
          <li>
            <a href="index.php">Home</a>
          </li>
          <li>
            Shop
          </li>
        </ul>
      </div>
      <div class="col-md-3">
        <?php include "includes/sidebar.php"; ?>
      </div>
      <div class="col-md-9">
      <?php
      if(!isset($_GET['p_cat'])){
        if(!isset($_GET['cat'])){
          echo "<div class='box'>
          <h1> Shop </h1>
          <p>
            Et culpa amet esse amet ipsum non fugiat amet sint ipsum pariatur proident sunt. Officia laboris Lorem voluptate eiusmod
            laborum minim cillum. Ullamco esse est id dolor eiusmod nisi id sint fugiat sit mollit adipisicing exercitation.</p>
        </div>";
          } }?>
        <!-- Box ends -->
        <!-- row starts -->
        <div class="row"> 
        <?php
        if(!isset($_GET['p_cat'])){
          if(!isset($_GET['cat'])){
            $per_page = 6;
            if(isset($_GET['page'])){
              $page = $_GET['page'];
            } else {
              $page = 1;
            }
            $start_from = ($page-1) * $per_page;
            $get_product = "SELECT * FROM products order by 1 DESC LIMIT $start_from,$per_page";
            $run_product = mysqli_query($con, $get_product);
            while($row_products = mysqli_fetch_array($run_product)){
              $pro_id = $row_products['product_id'];
              $pro_title = $row_products['product_title'];
              $pro_price = $row_products['product_price'];
              $pro_img1 = $row_products['product_img1'];
              ?>
          <div class="col-md-4 col-sm-6 center-responsive">
            <div class="product">
              <a href="details.php?pro_is=<?php echo $pro_id;?>">
                <img src="admin_area/product_images/<?php echo $pro_img1;?>" alt="" class="img-responsive">
              </a>
              <div class="text">
                <h3>
                  <a href="details.php?pro_is=<?php echo $pro_id;?>"><?php echo $pro_title;?></a>
                </h3>
                <p class="price"><?php echo $pro_price;?>$</p>
                <p class="buttons">
                  <a href="details.php?pro_is=<?php echo $pro_id;?>" class="btn btn-default">View details</a>
                  <a href="details.php?pro_is=<?php echo $pro_id;?>" class="btn btn-primary">
                    <i class="fa fa-shopping-cart"></i> Add to cart</a>
                </p>
              </div>
            </div>
            </div>
            <?php   
                      }
?>
          
         </div>
        <!-- row ends -->
        <center>
          <ul class="pagination">
            <?php
              $query = "SELECT * FROM products";
              $result = mysqli_query($con, $query);
              $total_row = mysqli_num_rows($result);
              $total_pages = ceil($total_row / $per_page);
              echo "<li><a href='shop.php?page=1'>".'First Page'."</a></li>";
                for($i=1;$i<=$total_pages;$i++){
                  echo "<li><a href='shop.php?page=$i'>".$i."</a></li>";
                }
              echo "<li><a href='shop.php?page=$total_pages'>".'Last Page'."</a></li>";
            }
            } 
            ?>
          </ul>
        </center>
          <?php getCatPro(); ?>
      </div>

    </div>
  </div>


  <?php include "includes/footer.php"; ?>
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>