<?php
error_reporting(E_ERROR);
include 'scripts/connect_to_database.php';
if(!$_SESSION['username']){
  include 'scripts/admin_display_page.php';
}
session_start();
// set the eid to the current logged in user
$eid = $_SESSION['username'];
$emp_status = $_SESSION['employee'];
?>

<html>
<head>
    <title> Papar Flower Shop </title>
</head>
<!-- links to css and fonts here --> 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="css/base.css">
<link rel="stylesheet" href="css/login.css">
<body>

<!-- banner section for the main heading -->
<div class="top-banner">
    <img src="images/banner-logo.png">
    <a href="index.php"><h1>MK FLORAL </h1></a>
</div>
<!-- end the banner section here -->

<!-- Navbar section bootstrap this  --> 
<nav class="navbar navbar-custom navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="arr.php">Arrangements</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Flowers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Chocolates</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Greens</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Trinkets</a>
        </li>
        <?php
        if($eid == 'pxk5296'){
          echo '
        <span class="admin-icons">
          <li class="nav-item">
            <a class="nav-link" href="admin.php"> <img src="images/admin.png"> </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php"> <img src="images/logout.png"> </a>
          </li>
        </span>';
        }

        else if($eid && $eid != 'pxk5296' && $emp_status == 1){
          echo '
          <span class="nav_icons">
          <li class="nav-item">
            <div class="profle_icon">
              <a class="nav-link" href="employee/eprofile.php"> <img src="images/profile.png"> </a>
            </div>
          </li>
          <li class="nav-item">
            <div class="profle_icon">
              <a class="nav-link" href="inventory.php"> <img src="images/inv.png"> </a>
            </div>
          </li>
          <li class="nav-item">
            <div class="profle_icon">
              <a class="nav-link" href="orders.php"> <img src="images/truck.png"> </a>
            </div>
          </li>
          <li class="nav-item">
             <div class="profle_icon">
              <a class="nav-link" href="logout.php"> <img src="images/logout.png"> </a>
            </div>
          </li>
          </span>';
        }

        else if($eid && $eid != 'pxk5296' && $emp_status != 1){
          echo '
          <span class="nav_icons">
          <li class="nav-item">
            <div class="profle_icon">
              <a class="nav-link" href="user/profile.php"> <img src="images/profile.png"> </a>
            </div>
          </li>
          <li class="nav-item">
            <div class="profle_icon">
              <a class="nav-link" href="shopping_cart.php"> <img src="images/shopping_cart.png"> </a>
            </div>
          </li>
          <li class="nav-item">
             <div class="profle_icon">
              <a class="nav-link" href="logout.php"> <img src="images/logout.png"> </a>
            </div>
          </li>
          </span>';
        }

        else{
          echo '
          <span class="def-icons">
            <li class="nav-item">
              <a class="nav-link" href="login.php"> Login </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="signup.php"> Signup </a>
            </li>
          </span>';
        
        }


        ?>
      </ul>
    </div>
  </div>
</nav>
<!-- Navbar section ends --> 


<?php

?>