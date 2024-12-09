<?php
include '../scripts/connect_to_database.php';
include '../scripts/get_employee_data.php';
include 'base_copy.php';
// start a php session
ob_start();
session_start();
?>
<link rel="stylesheet" href="../css/emp_profile.css">

<div class="top-header">
    <h1> Employee Management Portal </h1>
    <hr>
</div>


<div class="emp-details">
    <h2>Personal Information: </h2>
    <h3>EID:  <?php echo "<span class='emp-info'>" . $eid . "<span class='emp-info'>"; ?></h3>
    <h3>Full Name:  <?php echo "<span class='emp-info'>" . $fname . " " . $lname . "<span class='emp-info'>"; ?></h3>
    <h3>Position:   <?php echo "<span class='emp-info'>" . $position . "<span class='emp-info'>"; ?></h3>
    <h3>Years Worked:   <?php echo "<span class='emp-info'>" . $years_worked . "<span class='emp-info'>"; ?></h3>
    <h3>Date of Birth:   <?php echo "<span class='emp-info'>" . $dob . "<span class='emp-info'>"; ?></h3>
    <br>
    <hr>
 </div>

<br>
 <div class="emp-details">
    <h2>Assigned Arrangements: </h2>
    <br>
    <button type="submit" name="upd">View All</button>
    <button type="submit" name="cpass">Group by Customer</button>
    <button type="submit" name="cpass">Group by ZIP</button>
    <button type="submit" name="cpass">Order by Cost (LH)</button>
    <button type="submit" name="cpass">Order by Cost (HL)</button>
    <button type="submit" name="cpass">Update Records</button>
    <button type="submit" name="cpass">Delete Records</button>

    <div class="display-emp-tables">
        <?php include "../queries/employee-arr-queries.php"; ?>
    </div>
    
 </div>

 




</body>
</html>

<?php
ob_end_flush();
?>