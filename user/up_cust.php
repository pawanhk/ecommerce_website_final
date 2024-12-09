<?php
session_start(); 
include '../scripts/connect_to_database.php';
include 'base-copy.php';

?>

<link rel="stylesheet" href="../css/admin.css">

<div class="top-header">
    <h1> Customer Update Page </h1> <a href="profile.php"> Go Back </a>
    <hr>
</div>


<div class="update-form">
    <form method="POST">
        <h4>First Name </h4> <input type="text" name="fname"> 
        <h4>Last Name </h4> <input type="text" name="lname"> 
        <h4>Email </h4> <input type="text" name="email"> 
        <h4>Phone </h4> <input type="text" name="phone"> 
        <h4>Age </h4> <input type="text" name="age"> 
        <br>
        <button name="up" type="submit">Update</button>
    </form>
</div>


<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['up'])){
        // get the values from post to pass to the database
        $cid = $_SESSION['cid'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $age = $_POST['age'];

        // only continue if a CID was provided 
        if($cid){
            // get the original values
            try{
                // template query to select all employees
                $customer_template_query = "SELECT * FROM customer WHERE cid=:cid";
                // prepared select statement 
                $customer_prepared_statement = $database_connect->prepare($customer_template_query);
                // execute the prepared statement 
                $customer_prepared_statement->execute(array("cid"=> $cid));

                // return all the rows
                $customer_query_rows = $customer_prepared_statement->fetchAll(PDO::FETCH_ASSOC);

                // if the query returns with results 
                if(count($customer_query_rows) == 1){
                                // loop through the array and print out all the details
                                foreach($customer_query_rows as $row){
                                    $rfname = $row['fname'];
                                    $rlname = $row['lname'];
                                    $remail = $row['email'];
                                    $rphone = $row['phone'];
                                    $rage = $row['AGE'];
                                }
                }else{
                    echo '<p class="records_error"> Records could not be found !</p>';
                }
            }catch(PDOException $e){
                echo '<p class="records_error"> Query Error in the adming page !</p>';
            }

            // if no post for the data fill with the existing value, add additional error checks
            if($fname == NULL){
                $fname = $rfname;
            }      
            if($lname == NULL){
                $lname = $rlname;
            }
            if($email == NULL){
                $email = $remail;
            } 
            if($phone == NULL){
                $phone = $rphone;
            }
            if($age == NULL){
                $age = $rage;
            }    

            try{
                // template query to bind the username and password into
                $update_template_query = "UPDATE customer SET
                    fname = :fname,
                    lname = :lname,
                    email = :email,
                    phone = :phone,
                    AGE = :age
                    WHERE cid = :cid";
                // prepared login statement 
                $update_prepared_statement = $database_connect->prepare($update_template_query);
                // execute the prepared statement and bind the eid and password
                $update_prepared_statement->execute(array(
                    "fname"=>$fname,
                    "lname"=>$lname,
                    "email"=>$email,
                    "phone"=>$phone,
                    "age"=>$age,
                    "cid"=>$cid));

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
            echo '<p class="records_error"> EID is required !</p>';
        }
        
    }
}

?>

