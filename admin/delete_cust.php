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
    <h1> Admin - Customer Delete Page </h1> <a href="../admin.php"> Go Back </a>
    <hr>
</div>


<div class="update-form">
    <form method="POST">
        <h4>CID </h4> <input type="text" name="cid" placeholder="Enter the CID to delete"> 
        <p class="del-notice"> This action cannot be undone !</p>
        <button name="delt" type="submit">Delete</button>
    </form>
</div>


<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['delt'])){
        // get the values from post to pass to the database
        $cid = $_POST['cid'];

        // only continue if an EID was provided 
        if($cid){
            // get the original values
            try{   
                // start the transaction 
                // template query to select all employees
                $customer_template_query = "DELETE FROM customer WHERE cid=:cid";
                // prepared select statement 
                $customer_prepared_statement = $database_connect->prepare($customer_template_query);
                // execute the prepared statement 
                $customer_prepared_statement->execute(array("cid"=> $cid));

                // return all the rows
                $customer_query_rows = $customer_prepared_statement->fetchAll(PDO::FETCH_ASSOC);
                
                // if the query returns with results 
                if($customer_prepared_statement->rowCount()>0){
                    echo '<p class="records_update"> Record Deleted !</p>';
                }else{
                    echo '<p class="records_error"> Records could not be found !</p>';
                }

            }catch(PDOException $e){
                echo '<p class="records_error"> Query Error in the adming page !</p>';
            }
        }else{
            echo '<p class="records_error"> CID is required !</p>';
        }
        
    }
}



?>

