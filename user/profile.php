<?php
include '../scripts/connect_to_database.php';
include '../scripts/get_customer_data.php';
include 'base-copy.php';
if(!$eid){
    header("Location: ../index.php?noaccess");
}
?>

<link rel="stylesheet" href="../css/emp_profile.css">

<div class="top-header">
    <h1> User Management Portal </h1>
    <hr>
</div>


<div class="emp-details">
    <h2>Personal Information: </h2>
    <h3>Email:  <?php echo "<span class='emp-info'>" . $eid . "<span class='emp-info'>"; ?></h3>
    <h3>Full Name:  <?php echo "<span class='emp-info'>" . $fname . " " . $lname . "<span class='emp-info'>"; ?></h3>
    <h3>Phone:   <?php echo "<span class='emp-info'>" . $phone . "<span class='emp-info'>"; ?></h3>
    <h3>Age:   <?php echo "<span class='emp-info'>" . $age . "<span class='emp-info'>"; ?></h3>
    <br>
    <form method="POST">
        <button type="submit" name="upcust"> Update Information</button>
        <button type="submit" name="delcust"> Delete Account </button>
    </form><br>
    <hr>
 </div>


<div class="emp-details">
    <h2> Address Book: </h2><br>
    <form method="POST">
        <button type="submit" name="addall">View All</button>
        <button type="submit" name="addadd"> Add Address</button>
        <button type="submit" name="upadd">Update Address</button>
        <button type="submit" name="deladd">Delete Address</button>
    </form>
 </div>

 <div class="display-emp-tables">
        <?php include "../queries/customer-profile-queries.php"; ?>
</div>

<!--
<div class="emp-details">
    <hr>
    <h2> Order History: </h2><br>
    <button type="submit" name="upd">View All</button>
    <button type="submit" name="cpass">Order by Cost (LH)</button>
    <button type="submit" name="cpass">Order by Cost (HL)</button>  
    <button type="submit" name="cpass">Group by Address</button> 
 </div>

 <div class="display-emp-tables">
        <?php include "../queries/customer-profile-queries.php"; ?>
</div>

-->

 




</body>
</html>

