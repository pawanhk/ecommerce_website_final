<h4>First Name </h4> <input type="text" name="fname"> 
        <h4>Last Name </h4> <input type="text" name="lname"> 
        <h4>Position </h4> <input type="text" name="position"> 
        <h4>SSN </h4> <input type="text" name="ssn"> 
        <h4>Years Worked </h4> <input type="text" name="years_worked"> 
        <h4>Date of Birth </h4> <input type="text" name="dob" placeholder="YYYY/MM/DD"> 
        <br>
        <button name="update" type="submit">Update</button>
    </form>
</div>

<div id="result"></div>

<?php

if(isset($_POST['update'])){
    // get the values from post to pass to the database
    $eid = $_POST['eid'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $position = $_POST['position'];
    $ssn = $_POST['ssn'];
    $years_worked = $_POST['years_worked'];
    $dob = $_POST['dob'];

    // get the original values for the user 
    try{
        // template query to select all employees
        $employee_template_query = "SELECT * FROM employee WHERE eid=$eid";
        // prepared select statement 
        $employee_prepared_statement = $database_connect->prepare($employee_template_query);
        // execute the prepared statement 
        $employee_prepared_statement->execute();

        // return all the rows
        $employee_query_rows = $employee_prepared_statement->fetchAll(PDO::FETCH_ASSOC);

        // if the query returns with results 
        if(count($employee_query_rows) == 1){
                        // loop through the array and print out all the details
                        foreach($employee_query_rows as $row){
                            $eid = $row['eid'];
                            $rfname = $row['fname'];
                            $rlname = $row['lname'];
                            $rposition = $row['position'];
                            $rssn = $row['ssn'];
                            $ryears_worked = $row['years_worked'];
                            $rdob = $row['dob'];
                        }
        }else{
            echo "No data was found for this query !";
        }
    }catch(PDOException $e){
        echo "Query error in the admin page !";
    }

    echo $ryears_worked;

    // if no post for the data fill with the existing value, add additional error checks
    if($fname == NULL){
        $fname = $rfname;
    }else if($lname == NULL){
        $lname = $rlname;
    }else if($position == NULL){
        $position = $rposition;
    }else if($ssn == NULL){
        if(strlen($ssn) != 9){
            echo '<p class="records_update"> SSN not updated, requires 9 characters !</p>';
            $ssn = $rssn;
        }
        $ssn = $rssn;
    }else if($years_worked == NULL){
        $years_worked = $ryears_worked;
    }else if($dob == NULL){
        $dob = $rdob;
    }

    try{
        // template query to bind the username and password into
        $update_template_query = "UPDATE employees SET
            fname = :fname,
            lname = :lname,
            position = :position,
            ssn = :ssn,
            years_worked = :years_worked,
            dob = :dob WHERE eid = :eid ";
        // prepared login statement 
        $update_prepared_statement = $database_connect->prepare($update_template_query);
        // execute the prepared statement and bind the eid and password
        $update_prepared_statement->execute(array(
            "eid"=>$eid,
            "fname"=>$fname,
            "lname"=>$lname,
            "position"=>$position,
            "ssn"=>$ssn,
            "years_worked"=>$years_worked,
            "dob"=>$dob));

        // if the query returned with data, set the session variable
        if($update_prepared_statement->rowCount() != 0){
            echo '<p class="records_update"> Records Updated Successfully !</p>';
        }else{
            echo '<p class="incorrect_login"> Invalid data </p>';
        }
    }catch(PDOException $e){
        echo "Query error in update form !";
    }
}
