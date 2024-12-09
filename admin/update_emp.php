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
    <h1> Admin Employee Update Page </h1> <a href="../admin.php"> Go Back </a>
    <hr>
</div>


<div class="update-form">
    <form method="POST">
        <h4>EID </h4> <input type="text" name="eid"> 
        <h4>First Name </h4> <input type="text" name="fname"> 
        <h4>Last Name </h4> <input type="text" name="lname"> 
        <h4>Position </h4> <input type="text" name="position"> 
        <h4>SSN </h4> <input type="text" name="ssn"> 
        <h4>Years Worked </h4> <input type="text" name="years_worked"> 
        <h4>Date of Birth </h4> <input type="text" name="dob" placeholder="YYYY/MM/DD"> 
        <br>
        <button name="up" type="submit">Update</button>
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
        $years_worked = $_POST['years_worked'];
        $dob = $_POST['dob'];

        // only continue if an EID was provided 
        if($eid){
            // get the original values
            try{
                // template query to select all employees
                $employee_template_query = "SELECT * FROM employee WHERE eid=:eid";
                // prepared select statement 
                $employee_prepared_statement = $database_connect->prepare($employee_template_query);
                // execute the prepared statement 
                $employee_prepared_statement->execute(array("eid"=> $eid));

                // return all the rows
                $employee_query_rows = $employee_prepared_statement->fetchAll(PDO::FETCH_ASSOC);

                // if the query returns with results 
                if(count($employee_query_rows) == 1){
                                // loop through the array and print out all the details
                                foreach($employee_query_rows as $row){
                                    $rfname = $row['fname'];
                                    $rlname = $row['lname'];
                                    $rposition = $row['position'];
                                    $rssn = $row['ssn'];
                                    $ryears_worked = $row['years_worked'];
                                    $rdob = $row['DOB'];
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
            if($position == NULL){
                $position = $rposition;
            } 
            if($ssn == NULL){
                $ssn = $rssn;
            }
            if($ssn && strlen($ssn) != 9){
                echo '<p class="records_update"> SSN not updated, requires 9 characters !</p>';
                $ssn = $rssn;
            }    
            if($years_worked == NULL){
                $years_worked = $ryears_worked;
            }

            if($dob == NULL){
                $dob = $rdob;
            }

            try{
                // start the transaction
                $database_connect->beginTransaction();
                // template query to bind the username and password into
                $update_template_query = "
                    UPDATE employee SET
                    fname = :fname,
                    lname = :lname,
                    position = :position,
                    ssn = :ssn,
                    years_worked = :years_worked,
                    dob = :dob WHERE eid = :eid 
                    ";
                // prepared login statement 
                $update_prepared_statement = $database_connect->prepare($update_template_query);
                // execute the prepared statement and bind the eid and password
                $update_prepared_statement->execute(array(
                    "fname"=>$fname,
                    "lname"=>$lname,
                    "position"=>$position,
                    "ssn"=>$ssn,
                    "years_worked"=>$years_worked,
                    "dob"=>$dob,
                    "eid"=>$eid));

                // if the query returned with data, set the session variable
                if($update_prepared_statement->rowCount() > 0){
                    echo '<p class="records_update"> Records Updated Successfully !</p>';
                    $database_connect->commit();
                }else{
                    echo '<p class="records_error"> Invalid data </p>';
                }
            }catch(PDOException $e){
                //echo $e->getMessage();
                $database_connect->rollBack();
                echo '<p class="records_error"> Transaction Rolled Back !</p>';
            }
        }else{
            echo '<p class="records_error"> EID is required !</p>';
        }
        
    }
}

?>

