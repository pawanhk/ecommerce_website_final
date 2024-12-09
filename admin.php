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

<div class="main-header">
    <h1>Admin Management Portal</h1>
</div>

<div class="top-header">
    <h1> Employee and Customer Panel </h1>
    <hr>
</div>


<!-- Employee Information -->

<div class="employee">
    <h2> Employee Management </h2>
    <div class="sort">
        <form method="POST">
            <button name="allemp" type="submit"> All Employees </button>
            <button name="onlyexecs" type="submit"> Executives </button>
            <button name="odoboy" type="submit"> Order by DOB (OY) </button>
            <button name="odobyo" type="submit"> Order by DOB (YO) </button>
            <button name="newemp" type="submit"> New Employee </button>
            <button name="upemp" type="submit"> Update Records </button>
            <button name="delemp" type="submit"> Delete Records </button>
        </form>
    </div>

    <div class="display-emp-tables">
        <?php include 'queries/employee-table-queries.php'; ?>
    </div>


    <hr>

    <h2> Customer Management</h2>
    <div class="sort">
        <form method="POST">
            <button name="allcust" type="submit"> All Customer </button>
            <button name="grbyage" type="submit"> Group by Age </button>
            <button name="alladd" type="submit"> Address Book </button>
            <button name="grbyzip" type="submit"> Group by ZIP </button>
            <button name="srcust" type="submit"> Search Customer </button>
            <button name="upcust" type="submit"> Update Records </button>
            <button name="delcust" type="submit"> Delete Records </button>
        </form>
    </div>

    <div class="display-emp-tables">
        <?php include 'queries/customer-table-queries.php'; ?>
    </div>

</div>
</div>

<div class="top-header">
    <hr>
</div>



<!-- Footer section starts here -->

<?php include 'footer.php' ?>

<!-- Footer section ends here -->
