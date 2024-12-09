<?php
session_start(); 
include 'scripts/connect_to_database.php';
include 'base.php';
?>

<link rel="stylesheet" href="css/cart.css">
 
<div class="top-header">
    <h1> Shopping Cart </h1>
    <hr>
</div>



<div class="display-emp-tables">
        <?php include 'scripts/get_customer_orders.php'; ?>
        <div class="total">
               <h3>Shopping Cart Total: </h3> <span class="tcost"><?php echo $price; ?>$</span>
        </div>
</div>


