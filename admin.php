<?php
session_start(); 
include 'scripts/connect_to_database.php';
include 'base.php';
// if its another user and not the admin, kick them out
if($eid != "pxk5296"){
    header("Location: index.php?noaccess");
}
?>

<link rel="stylesheet" href="css/admin.css">

<div class="top-header">
    <h1> Admin Panel </h1>
    <hr>
</div>


<!-- Employee Information -->

<div class="employee">
    <h1> Employee Information </h1>
    <div class="sort">
        <form method="POST">
            <button name="allemp" type="submit"> All Employees </button>
            <button name="onlyexecs" type="submit"> Executives </button>
            <button name="odoboy" type="submit"> Order by DOB (OY) </button>
            <button name="odobyo" type="submit"> Order by DOB (YO) </button>
            <button name="upemp" type="submit"> Update Records </button>
            <button name="delemp" type="submit"> Delete Records </button>
        </form>
    </div>


    <div class="display-emp-tables">
        <?php include 'queries/employee-table-queries.php'; ?>
    </div>
</div>



<!-- Footer section starts here -->

<?php include 'footer.php' ?>

<!-- Footer section ends here -->
