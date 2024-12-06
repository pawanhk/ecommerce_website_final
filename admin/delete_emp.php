<?php
session_start(); 
include '../scripts/connect_to_database.php';
include 'base-copy.php';
// if its another user and not the admin, kick them out
if($eid != "pxk5296"){
    header("Location: index.php?noaccess");
}
?>

<link rel="stylesheet" href="../css/admin.css">

<div class="top-header">
    <h1> Admin Employee Delete Page </h1> <a href="../admin.php"> Go Back </a>
    <hr>
</div>


<div class="update-form">
    <form method="POST">
        <h4>EID </h4> <input type="text" name="eid" placeholder="Enter the EID to delete"> 
        <p class="del-notice"> This action cannot be undone !</p>
        <button name="delt" type="submit">Delete</button>
    </form>
</div>


<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['delt'])){
        // get the values from post to pass to the database
        $eid = $_POST['eid'];

        // only continue if an EID was provided 
        if($eid){
            // get the original values
            try{   
                // start the transaction 
                // template query to select all employees
                $employee_template_query = "DELETE FROM employee WHERE eid=:eid";
                // prepared select statement 
                $employee_prepared_statement = $database_connect->prepare($employee_template_query);
                // execute the prepared statement 
                $employee_prepared_statement->execute(array("eid"=> $eid));

                // return all the rows
                $employee_query_rows = $employee_prepared_statement->fetchAll(PDO::FETCH_ASSOC);
                
                // if the query returns with results 
                if($employee_prepared_statement->rowCount()>0){
                    echo '<p class="records_update"> Record Deleted !</p>';
                }else{
                    echo '<p class="records_error"> Records could not be found !</p>';
                }

            }catch(PDOException $e){
                echo '<p class="records_error"> Query Error in the adming page !</p>';
            }
        }else{
            echo '<p class="records_error"> EID is required !</p>';
        }
        
    }
}



?>

