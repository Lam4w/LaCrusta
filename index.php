<?php

//start session

session_start();

require_once('./assets/php/createDb.php');
require_once('./assets/php/component.php');


//createa instance of createdb

$database = new createDb("ProductDb","Producttbl","ordertbl");

if (isset($_POST['add'])){
  print_r($_POST['product_id']);

  if(isset($_SESSION['cart'])){

      $item_array_id = array_column($_SESSION['cart'], "product_id");

      // $item_array_id = array_map('intval', array_column($_SESSION['cart'], "product_id"));

      if(in_array($_POST['product_id'], $item_array_id)){
          echo "<script>alert('You already added this dish in the cart..!')</script>";
          echo "<script>window.location = 'index.php'</script>";
      }else{

        $count = count($_SESSION['cart']);
        $item_array = array(
            'product_id' => $_POST['product_id']
        );

        $_SESSION['cart'][$count] = $item_array;
      }




  }else{

      $item_array = array(
        'product_id' => $_POST['product_id']
      );

      // Create new session variable
      $_SESSION['cart'][0] = $item_array;
      print_r($_SESSION['cart']);
  }
  
}



if (isset($_POST['remove'])){
  if ($_GET['action'] == 'remove'){
      foreach ($_SESSION['cart'] as $key => $value){
          if($value["product_id"] == $_GET['id']){
              unset($_SESSION['cart'][$key]);
          }
      }
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>La Crusta.</title>
  <link rel="icon" href="./assets/img/logo/lacrusta-website-logo.png">

  <!-- 
    - css link
  -->
  <link rel="stylesheet" href="/project-crusta/assets/css/menu.css">
  <link rel="stylesheet" href="/project-crusta/assets/css/mediaqueries.css">

  <!-- 
    - icon link
  -->

  <link href='https://css.gg/chevron-right-r.css' rel='stylesheet'>
  <link href='https://css.gg/chevron-left-r.css' rel='stylesheet'>
  <link href='https://css.gg/calendar-dates.css' rel='stylesheet'>
  <link href='https://css.gg/user.css' rel='stylesheet'>
  <link href='https://css.gg/arrow-right.css' rel='stylesheet'>
  <link href='https://css.gg/bell.css' rel='stylesheet'>
  <link href='https://css.gg/instagram.css' rel='stylesheet'>
  <link href='https://css.gg/facebook.css' rel='stylesheet'>
  <link href='https://css.gg/twitter.css' rel='stylesheet'>
  <link href='https://css.gg/unsplash.css' rel='stylesheet'>
  <link href='https://css.gg/close-r.css' rel='stylesheet'>
  <link href='https://css.gg/list.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link href='https://css.gg/trash.css' rel='stylesheet'>
  <link href='https://css.gg/math-minus.css' rel='stylesheet'>
  <link href='https://css.gg/math-plus.css' rel='stylesheet'>
  <link href='https://css.gg/add.css' rel='stylesheet'>
  <link href='https://css.gg/remove.css' rel='stylesheet'>
  <link href='https://css.gg/bowl.css' rel='stylesheet'>

  <!-- 
    - font link
  -->
  
  <link rel="stylesheet" href="assets/font/sweetsans/style.css">
  <link href="http://fonts.cdnfonts.com/css/herr-von-muellerhoff" rel="stylesheet">
  <link href="http://fonts.cdnfonts.com/css/nexa-rust-extras" rel="stylesheet">

</head>

<body id="top">

  <!-- 
    - #HEADER
  -->

  <header class="header" data-header>
    <div class="container">

      <h1>
        <a href="#" class="logo">La Crusta<span class="span">.</span></a>
      </h1>

      <nav class="navbar" data-navbar>
        <ul class="navbar-list">

          <li class="nav-item">
            <a href="index.html" class="navbar-link" data-nav-link>Home</a>
          </li>

          <li class="nav-item">
            <a href="/#about" class="navbar-link" data-nav-link>About Us</a>
          </li>

          <li class="nav-item">
            <a href="menu.html" class="navbar-link" data-nav-link>Menu</a>
          </li>

          <li class="nav-item">
            <a href="/#blog" class="navbar-link" data-nav-link>Blog</a>
          </li>

          <li class="nav-item">
            <a href="/#contact" class="navbar-link" data-nav-link>Contact</a>
          </li>

        </ul>
      </nav>

      <div class="header-btn-group">
        <button class="btn btn-hover js-order-btn">

        <span class="span">
          <!-- <i class="gg-bowl"></i> -->
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <circle cx="6" cy="19" r="2"></circle>
            <circle cx="17" cy="19" r="2"></circle>
            <path d="M17 17h-11v-14h-2"></path>
            <path d="M6 5l14 1l-1 7h-13"></path>
          </svg>
        </span>
      
        <?php 

          if(isset($_SESSION['cart'])) {
            $count=count($_SESSION['cart']);
            echo "<span class=\"span\" id=\"cart_count\">$count</span>";
          }
          else {
            echo "<span class=\"span\" id=\"cart_coun\">0</span>";
          }

        ?>
      </button>


        <button class="nav-toggle-btn" aria-label="Toggle Menu" data-menu-toggle-btn>
          <span class="line top"></span>
          <span class="line middle"></span>
          <span class="line bottom"></span>
        </button>
      </div>

    </div>
  </header>


  <main>
    <article>
        <!-- 
        - #MENU 
      -->

      <section class="menu-hero" style="background-image: url('./assets/img/menu-bg.jpg')">

        <h2 class="h2 section-title">MENU</h2>

      </section>


      <section class="menu" id="menu">
      <div class="container">

        <!-- <h2 class="h2 section-title">Menu</h2>

        <p class="section-text">
          Sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt labore dolore magna aliqua suspendisse
        </p> -->

        <div class="menu-container">

          <ul class="menu-filter">

            <li>
              <button class="filter-btn active" data-filter-btn="all">
                <p class="btn-text">All Dishes</p>
              </button>
            </li>

            <li>
              <button class="filter-btn" data-filter-btn="pizza">
                <p class="btn-text">Pizza</p>
              </button>
            </li>

            <li>
              <button class="filter-btn" data-filter-btn="pasta">
                <p class="btn-text">Pasta</p>
              </button>
            </li>

            <li>
              <button class="filter-btn" data-filter-btn="ravioli">
                <p class="btn-text">Ravioli</p>
              </button>
            </li>

            <li>
              <button class="filter-btn" data-filter-btn="spaghetti">
                <p class="btn-text">Spaghetti</p>
              </button>
            </li>

            <li>
              <button class="filter-btn" data-filter-btn="salad">
                <p class="btn-text">Salad</p>
              </button>
            </li>

          </ul>

          <ul class="grid-list">

            <?php 
            
            $result=$database->getData();
            // $result=getData();
            while($row=mysqli_fetch_assoc($result)) {
              component($row['product_name'],$row['product_filter'],$row['product_desc'],$row['product_price'],$row['product_image'],$row['id']);
            }

            ?>

          </ul>

        </div>

      </div>
    </section>






    </article>
  </main>


  <!-- 
    - #FOOTER
  -->

  <footer class="footer" id="contact">

    <div class="footer-top section">
      <div class="container">

        <div class="footer-brand">

          <a href="#">
            <img src="./assets/img/logo/lacrusta-footer-logo.svg" alt="" class="footer-logo">
          </a>

          <p class="footer-text">
            Join our newsletter
          </p>

          <form action="" class="newsletter-form">
            <input type="email" name="email_address" placeholder="Enter your email" required class="email-field">

            <button type="submit" class="form-btn">
              <i class="gg-bell"></i>
            </button>
          </form>

        </div>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Navigation</p>
          </li>

          <li>
            <a href="#" class="footer-link">Home</a>
          </li>

          <li>
            <a href="#" class="footer-link">About Us</a>
          </li>

          <li>
            <a href="#" class="footer-link">Menu</a>
          </li>

          <li>
            <a href="#" class="footer-link">Blog</a>
          </li>

          <li>
            <a href="#" class="footer-link">Contact</a>
          </li>

        </ul>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Opening Hours</p>
          </li>

          <li>
            <p class="opening-hours"><b>Monday-Friday: </b> 08:00-22:00</p>
          </li>

          <li>
            <p class="opening-hours"><b>Tuesday:</b> 4PM-Till Mid Night</p>
          </li>

          <li>
            <p class="opening-hours"><b>Saturday:</b> 10:00-16:00</p>
          </li>

        </ul>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Contact Us</p>
          </li>

          <li class="footer-item">
            <ion-icon name="location" aria-hidden="true"></ion-icon>

            <address class="contact-link address">
              332 Tran Dai Nghia. Hai Ba Trung, Ha Noi.
            </address>
          </li>

          <li class="footer-item">
            <ion-icon name="call" aria-hidden="true"></ion-icon>

            <a href="tel:+7894631546876" class="contact-link">+7894631546876</a>
          </li>

          <li class="footer-item">
            <ion-icon name="mail" aria-hidden="true"></ion-icon>

            <a href="mailto:lacrust24@gmail.com" class="contact-link">lacrusta24@gmail.com</a>
          </li>

          <li class="footer-item">
            <ul class="social-list">

              <li>
                <a href="#" class="social-link">
                  <i class="gg-instagram"></i>
                </a>
              </li>

              <li>
                <a href="#" class="social-link">
                  <i class="gg-facebook"></i>
                </a>
              </li>

              <li>
                <a href="#" class="social-link">
                  <i class="gg-twitter"></i>
                </a>
              </li>

              <li>
                <a href="#" class="social-link">
                  <i class="gg-unsplash"></i>
                </a>
              </li>

            </ul>
          </li>

        </ul>

      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">

        <p class="copyright">
          &copy; 2022 Crusta | All Rights Reserved by <a href="#" class="copyright-link">La Crusta</a>
        </p>

        <ul class="footer-bottom-list">

          <li>
            <a href="#" class="footer-bottom-link">Privacy Policy</a>
          </li>

          <li>
            <a href="#" class="footer-bottom-link">Terms of Use</a>
          </li>

        </ul>

      </div>
    </div>

  </footer>


<!-- 
    - #ORDER CART
-->


  <div class="cart-order js-cart-order">
    <div class="cart-order-container js-cart-container">

      <div class="order-list">
        <div class="order-list-header">

          <h2 class="title">SHOPPING CART</h2>
  
          <div class="order-details">
  
            <div class="details-left">
              <!-- <p>Product details</p> -->
            </div>
  
            <div class="details-right">
              <p class="subtitle">product</p>
              <p class="subtitle">price</p>
              <p class="subtitle qty">qty</p>
              <p class="subtitle">remove</p>
            </div>
  
          </div>

        </div>


        <ul class="order-items">

          <?php
            $total = 0;

            $product_id = array_column($_SESSION['cart'], 'product_id');

            $result = $database->getData();
            // $result= getData();

            while($row = mysqli_fetch_assoc($result)) {
              foreach($product_id as $id) {
                if($row['id']==$id) {
                  cartElem($row['product_image'],$row['product_name'],$row['product_price'],$row['id']);

                  $total = $total + (int)$row['product_price'];
                }
              }
            }

          ?>

        </ul>

      </div>

      <div class="order-price">

        <h2 class="title">Order summary</h2>

        <div class="order-list-close js-order-close">
          <i class="gg-close-r"></i>
        </div>

        <div class="order-price-container">
          <!-- <div class="total-price"> -->

            <?php
  
              if(isset($_SESSION['cart'])) {
                $count = count($_SESSION['cart']);
  
                echo "<p class=\"subtitle\">items $count </p>";
              } else {
                echo "<p class=\"subtitle\">items 0 </p>";
              }
              
             echo "<p class=\"left subtitle\">$ $total </p>";
            ?>
  
          <!-- </div> -->

          <p class="subtitle">Shipping fee</p>

          <p class="left subtitle">Free</p>

          <p class="subtitle">Cart total</p>
          
          <?php
          echo "<p class=\"left subtitle\">$ $total </p>";
          ?>

        </div>

        <button class="check-out">
          Check Out
        </button>

      </div>

    </div>
  </div>


  <script src="assets/js/menu.js" defer></script>
 
</body>


