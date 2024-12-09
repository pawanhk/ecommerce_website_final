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
    <h3>Step 4 - Choose Trinkets Or Continue !</h3> <a href="arr2.php">go back</a><br><br>
    <form method="POST">
            <button name="alltrinks" type="submit"> View All Trinkets  </button>
            <button name="tpricelo" type="submit"> Price (Lowest-Highest) </button>
            <button name="tpricehi" type="submit"> Price (Highest-Lowest) </button>
            <button name="tskip" type="submit"> Skip </button>
    </form>
    <hr>
</div>


<div class="display-emp-tables">
        <?php include 'queries/create-arrangements-queries.php'; ?>
</div>
