<?php
session_start(); 
include '../scripts/connect_to_database.php';
include 'base-copy.php';

?>

<link rel="stylesheet" href="../css/admin.css">

<div class="top-header">
    <h1> Delete an Address </h1> <a href="profile.php"> Go Back </a>
    <hr>
</div>


<div class="update-form">
    <form method="POST">
    <h4>ADD_ID </h4> <input type="text" name="add_id"> 
        <h4 class="del-notice"> Are you sure you want to delete this address ? This action cannot be undone !</h4>
        <button name="delt" type="submit">Delete</button>
    </form>
</div>


<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['delt'])){
        // get the values from post to pass to the database
        $cid = $_SESSION['cid'];
        $add_id = $_POST['add_id'];

        // only continue if an EID was provided 
        if($add_id){
            // get the original values
            try{   
                // start the transaction 
                // template query to select all employees
                $customer_template_query = "DELETE FROM address WHERE add_id=:add_id AND cid=:cid";
                // prepared select statement 
                $customer_prepared_statement = $database_connect->prepare($customer_template_query);
                // execute the prepared statement 
                $customer_prepared_statement->execute(array("add_id"=>$add_id,"cid"=> $cid));

                // return all the rows
                $customer_query_rows = $customer_prepared_statement->fetchAll(PDO::FETCH_ASSOC);
                
                // if the query returns with results 
                if($customer_prepared_statement->rowCount()>0){
                    header("Location: profile.php");
                }else{
                    echo '<p class="records_error"> Records could not be found !</p>';
                    exit();
                }

            }catch(PDOException $e){
                echo $e->getMessage();
                echo '<p class="records_error"> Query Error in the adming page !</p>';
            }
        }else{
            echo '<p class="records_error"> add_id is required !</p>';
        }
        
    }
}



?>

