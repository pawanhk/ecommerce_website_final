<?php
session_start(); 
include '../scripts/connect_to_database.php';
include 'base-copy.php';
?>

<link rel="stylesheet" href="../css/admin.css">

<div class="top-header">
    <h1> Add A New Address </h1> <a href="profile.php"> Go Back </a>
    <hr>
</div>


<div class="update-form">
    <form method="POST">
        <h4>Primary Address </h4> <input type="text" name="padd"> 
        <h4>Secondary Address </h4> <input type="text" name="sadd"> 
        <h4>City </h4> <input type="text" name="city"> 
        <h4>State </h4> <input type="text" name="state"> 
        <h4>Zip </h4> <input type="text" name="zip"> 
        <br>
        <button name="up" type="submit">Add</button>
    </form>
</div>


<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['up'])){
        // get the values from post to pass to the database
        $cid = $_SESSION['cid'];
        $padd = $_POST['padd'];
        $sadd = $_POST['sadd'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];
        // only continue if an EID was provided 
        if($cid){
            try{
                // template query to bind the username and password into
                $insert_template_query = "INSERT INTO address (cid,primary_add,secondary_add,city,state,zip)
                VALUES(:cid,:padd,:sadd,:city,:state,:zip)";
                // prepared login statement 
                $insert_prepared_statement = $database_connect->prepare($insert_template_query);
                // execute the prepared statement and bind the eid and password
                $insert_prepared_statement->execute(array(
                    "cid"=>$cid,
                    "padd"=>$padd,
                    "sadd"=>$sadd,
                    "city"=>$city,
                    "state"=>$state,
                    "zip"=>$zip));

                // if the query returned with data, set the session variable
                if($insert_prepared_statement->rowCount() > 0){
                    echo '<p class="records_update"> New Address Added Successfully !</p>';
                }else{
                    echo '<p class="records_error"> Invalid data </p>';
                }
            }catch(PDOException $e){
                echo $e->getMessage();
                echo '<p class="records_error"> Query Error in the admin page 1 !</p>';
            }
        }else{
            echo '<p class="records_error"> CID is missing !</p>';
        }
        
    }
}

?>

