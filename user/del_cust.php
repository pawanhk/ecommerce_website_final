<?php
session_start(); 
include '../scripts/connect_to_database.php';
include 'base-copy.php';

?>

<link rel="stylesheet" href="../css/admin.css">

<div class="top-header">
    <h1> Customer Delete Page </h1> <a href="profile.php"> Go Back </a>
    <hr>
</div>


<div class="update-form">
    <form method="POST">
        <h3 class="del-notice"> Are you sure you want to delete your account ? This action cannot be undone !</h3>
        <button name="delt" type="submit">Delete</button>
    </form>
</div>


<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['delt'])){
        // get the values from post to pass to the database
        $cid = $_SESSION['cid'];

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
                    header("Location: ../logout.php");
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

