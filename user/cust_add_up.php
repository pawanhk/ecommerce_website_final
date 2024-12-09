<?php
session_start(); 
include '../scripts/connect_to_database.php';
include 'base-copy.php';
?>

<link rel="stylesheet" href="../css/admin.css">

<div class="top-header">
    <h1> Edit an Address </h1> <a href="profile.php"> Go Back </a>
    <hr>
</div>


<div class="update-form">
    <form method="POST">
        <h4>ADD_ID </h4> <input type="text" name="add_id"> 
        <h4>Primary Address </h4> <input type="text" name="padd"> 
        <h4>Secondary Address </h4> <input type="text" name="sadd"> 
        <h4>City </h4> <input type="text" name="city"> 
        <h4>State </h4> <input type="text" name="state"> 
        <h4>Zip </h4> <input type="text" name="zip"> 
        <br>
        <button name="addup" type="submit">Update</button>
    </form>
</div>


<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['addup'])){
        // get the values from post to pass to the database
        $cid = $_SESSION['cid'];
        $add_id = $_POST['add_id'];
        $padd = $_POST['padd'];
        $sadd = $_POST['sadd'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];
        // only continue if a CID was provided 
        if($add_id){
            // get the original values
            try{
                // template query to select all employees
                $customer_template_query = "SELECT * FROM address WHERE add_id=:add_id AND cid=:cid";
                // prepared select statement 
                $customer_prepared_statement = $database_connect->prepare($customer_template_query);
                // execute the prepared statement 
                $customer_prepared_statement->execute(array("add_id"=> $add_id,"cid"=> $cid));

                // return all the rows
                $customer_query_rows = $customer_prepared_statement->fetchAll(PDO::FETCH_ASSOC);

                // if the query returns with results 
                if(count($customer_query_rows) > 0){
                                // loop through the array and print out all the details
                                foreach($customer_query_rows as $row){
                                    $rpadd  = $row['primary_add'];
                                    $rsadd = $row['secondary_add'];
                                    $rcity = $row['city'];
                                    $rstate = $row['state'];
                                    $rzip = $row['zip'];
                                }
                }else{
                    echo '<p class="records_error"> Records could not be found !</p>';
                    exit();
                }
            }catch(PDOException $e){
                echo '<p class="records_error"> Cannot process this update !</p>';
            }

            // if no post for the data fill with the existing value, add additional error checks
            if($padd == NULL){
                $padd = $rpadd;
            }      
            if($sadd == NULL){
                $sadd = $rsadd;
            }
            if($city == NULL){
                $city = $rcity;
            } 
            if($state == NULL){
                $state = $rstate;
            }
            if($zip == NULL){
                $zip = $rzip;
            }    

            try{
                // template query to bind the username and password into
                $update_template_query = "UPDATE address SET
                    primary_add = :padd,
                    secondary_add = :sadd,
                    city = :city,
                    state = :state,
                    zip = :zip
                    WHERE add_id = :add_id";
                // prepared login statement 
                $update_prepared_statement = $database_connect->prepare($update_template_query);
                // execute the prepared statement and bind the eid and password
                $update_prepared_statement->execute(array(
                    "padd"=>$padd,
                    "sadd"=>$sadd,
                    "city"=>$city,
                    "state"=>$state,
                    "zip"=>$zip,
                    "add_id"=>$add_id));

                // if the query returned with data, set the session variable
                if($update_prepared_statement->rowCount() > 0){
                    echo '<p class="records_update"> Records Updated Successfully !</p>';
                }else{
                    echo '<p class="records_error"> Invalid data </p>';
                }
            }catch(PDOException $e){
                echo $e->getMessage();
                echo '<p class="records_error"> Query Error in the adming page 1 !</p>';
            }
        }else{
            echo '<p class="records_error"> add_id is required !</p>';
        }
        
    }
}

?>

