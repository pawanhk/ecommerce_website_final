<?php
error_reporting(E_ALL ^ E_WARNING);
include 'scripts/connect_to_database.php';
include 'scripts/admin_display_page.php';
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
          <a class="nav-link" href="#">Arrangements </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Trinkets</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Greens</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Containers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Chocolates</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Shopping Cart</a>
        </li>
        <?php
        if($eid == 'pxk5296'){
          echo '
        <li class="nav-item">
          <a class="nav-link" href="admin.php"> Admin </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php"> Logout </a>
        </li>';
        }

        else if($eid && $eid != 'pxk5296'){
          echo '
          <li class="nav-item">
            <a class="nav-link" href="profile.php"> Profile </a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="logout.php"> Logout </a>
          </li>'; 
        }

        else{
          echo '
          <li class="nav-item">
            <a class="nav-link" href="login.php"> Login </a>
          </li>';
        }


        ?>
      </ul>
    </div>
  </div>
</nav>
<!-- Navbar section ends --> 