<?php
$db = mysqli_connect("localhost","root","root","e_com");

function getPro(){
    global $db;
    $get_product = "SELECT * FROM products ORDER BY 1 DESC LIMIT 0,8";
    $run_product = mysqli_query($db, $get_product);
    while($row = mysqli_fetch_array($run_product)){
        $pro_id = $row['product_id'];
        $pro_title = $row['product_title'];
        $pro_price = $row['product_price'];
        $pro_img1 = $row['product_img1'];
        echo "
        <div class='col-sm-4 col-sm-6 single'>
        <div class='product'>
          <a href='details.php?pro_id=$pro_id'>
            <img src='admin_area/product_images/$pro_img1' alt='' class='img-responsive'>
          </a>

          <div class='text'>
            <h3>
              <a href='details.php?pro_id=$pro_id'>$pro_title</a>
            </h3>
            <p class='price'>$ $pro_price</p>
            <p class='buttons'>
              <a href='details.php?pro_id=$pro_id' class='btn btn-default'>View details</a>
              <a href='cart.php?pro_id=$pro_id' class='btn btn-primary'>
                <i class='fa fa-shopping-cart'></i> Add to Cart
              </a>
            </p>
          </div>
        </div>
      </div>";
    }
}

function proCats(){
  global $db;
  $get_p_cats = "SELECT * FROM product_categories";
  $run_p_cats = mysqli_query($db ,$get_p_cats);
  while($row = mysqli_fetch_array($run_p_cats)){
    $p_cat_id = $row['p_cat_id'];
    $p_cat_title = $row['p_cat_title'];
    echo "<li><a href='shop.php?p_cat=$p_cat_id'> $p_cat_title</a></li>";
  }
}

function getCats(){
  global $db;
  $get_cats = "SELECT * FROM categories";
  $run_cats = mysqli_query($db ,$get_cats);
  while($row = mysqli_fetch_array($run_cats)){
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];
    echo "<li><a href='shop.php?p_cat=$cat_id'> $cat_title</a></li>";
  }
}
?>