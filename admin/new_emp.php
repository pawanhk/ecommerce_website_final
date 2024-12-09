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
    <h1> Admin - New Employee Page </h1> <a href="../admin.php"> Go Back </a>
    <hr>
</div>


<div class="update-form">
    <form method="POST">
        <h4>EID </h4> <input type="text" name="eid"> 
        <h4>First Name </h4> <input type="text" name="fname"> 
        <h4>Last Name </h4> <input type="text" name="lname"> 
        <h4>Position </h4> <input type="text" name="position"> 
        <h4>SSN </h4> <input type="text" name="ssn"> 
        <h4>password </h4> <input type="password" name="password"> 
        <h4>Years Worked </h4> <input type="text" name="years_worked"> 
        <h4>Date of Birth </h4> <input type="text" name="dob" placeholder="YYYY/MM/DD"> 
        <br>
        <button name="up" type="submit">Add</button>
    </form>
</div>


<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['up'])){
        // get the values from post to pass to the database
        $eid = $_POST['eid'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $position = $_POST['position'];
        $ssn = $_POST['ssn'];
        $password = $_POST['password'];
        $years_worked = $_POST['years_worked'];
        $dob = $_POST['dob'];

        // encrypt the password
        $epass = password_hash($password, PASSWORD_DEFAULT);
        $password = $epass;

        // only continue if an EID was provided 
        if($eid){
            try{
                // template query to bind the username and password into
                $insert_template_query = "INSERT INTO employee (eid,fname,lname,position,ssn,password,years_worked,dob)
                VALUES(:eid,:fname,:lname,:position,:ssn,:password,:years_worked,:dob)";
                // prepared login statement 
                $insert_prepared_statement = $database_connect->prepare($insert_template_query);
                // execute the prepared statement and bind the eid and password
                $insert_prepared_statement->execute(array(
                    "fname"=>$fname,
                    "lname"=>$lname,
                    "position"=>$position,
                    "password"=> $password,
                    "ssn"=>$ssn,
                    "years_worked"=>$years_worked,
                    "dob"=>$dob,
                    "eid"=>$eid));

                // if the query returned with data, set the session variable
                if($insert_prepared_statement->rowCount() > 0){
                    echo '<p class="records_update"> New Employee Added Successfully !</p>';
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

