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
    <h3>Last Step - Choose a Container !</h3> <a href="arr3.php">go back</a><br><br>
    <form method="POST">
            <button name="allcons" type="submit"> View All Containers  </button>
            <button name="cpricelo" type="submit"> Price (Lowest-Highest) </button>
            <button name="cpricehi" type="submit"> Price (Highest-Lowest) </button>
    </form>
    <hr>
</div>


<div class="display-emp-tables">
        <?php include 'queries/create-arrangements-queries.php'; ?>
</div>
