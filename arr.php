<?php
session_start(); 
include 'scripts/connect_to_database.php';
include 'base.php';
?>

<link rel="stylesheet" href="css/arr.css">
 
<div class="top-header">
    <h1> Create Custom Arrangements </h1>
    <hr>
</div>

<div class="ch-header">
    <h3>Step 1 - Choose The Base Flower</h3><br><br>
    <form method="POST">
            <button name="allflowers" type="submit"> View All Flowers  </button>
            <button name="pricelo" type="submit"> Price (Lowest-Highest) </button>
            <button name="pricehi" type="submit"> Price (Highest-Lowest) </button>
            <button name="petsafe" type="submit"> Pet Safe  </button>
    </form>
    <hr>
</div>


<div class="display-emp-tables">
        <?php include 'queries/create-arrangements-queries.php'; ?>
</div>


