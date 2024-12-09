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
    <h1> Inventory Management Portal </h1>
    <hr>
</div>


<br>
<div class="emp-details">
    <h2>View All Arrangements: </h2>
    <br>
    <form method="POST">
        <button type="submit" name="view_all">View All</button>
    </form>

    <div class="display-emp-tables">
        <?php include "../queries/employee-arr-queries.php"; ?>
    </div>
    
 </div>







 




</body>
</html>

<?php
ob_end_flush();
?>