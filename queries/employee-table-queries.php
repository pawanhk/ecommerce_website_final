<link rel="stylesheet" href="../css/admin.css">
<?php

include 'connect_to_database.php';

// check for post 
if($_SERVER['REQUEST_METHOD'] == "POST"){
    // q1: All Employees
    if(isset($_POST['allemp'])){
        try{
            // template query to select all employees
            $employee_template_query = "SELECT * FROM employee";
            // prepared select statement 
            $employee_prepared_statement = $database_connect->prepare($employee_template_query);
            // execute the prepared statement 
            $employee_prepared_statement->execute();

            // return all the rows
            $employee_query_rows = $employee_prepared_statement->fetchAll(PDO::FETCH_ASSOC);

            // if the query returns with results 
            if(count($employee_query_rows)>0){
                echo "<p> Successfully Found Table Results ... </p>";
                echo "<table>";
                echo "<tr>
                <th>EID</th>
                <th> First Name </th>
                <th> Last Name </th>
                <th> Position </th>
                <th> SSN </th>
                <th> Years Worked </th>
                <th> Date of Birth </th>
                </tr>";
                // loop through the array and print out all the details
                foreach($employee_query_rows as $row){
                    $eid = $row['eid'];
                    echo "<td>" . $eid . "</td>";
                    $fname = $row['fname'];
                    echo "<td>" .$fname . "</td>";
                    $lname = $row['lname'];
                    echo "<td>" . $lname . "</td>";
                    $position = $row['position'];
                    echo "<td>" . $position . "</td>";
                    $ssn = $row['ssn'];
                    echo "<td>" . $ssn . "</td>";
                    $years_worked = $row['years_worked'];
                    echo "<td>" . $years_worked . "</td>";
                    $DOB = $row['DOB'];
                    echo "<td>" . $DOB . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }else{
                echo "No data was found for this query !";
            }
        }catch(PDOException $e){
            echo "Query error in the admin page !";
        }
    }
    //q2: Order by DOB oldest to youngest
    if(isset($_POST['odoboy'])){
        try{
            // template query to select all employees
            $employee_template_query = "SELECT * FROM employee ORDER BY DOB";
            // prepared select statement 
            $employee_prepared_statement = $database_connect->prepare($employee_template_query);
            // execute the prepared statement 
            $employee_prepared_statement->execute();

            // return all the rows
            $employee_query_rows = $employee_prepared_statement->fetchAll(PDO::FETCH_ASSOC);

            // if the query returns with results 
            if(count($employee_query_rows)>0){
                echo "<p> Successfully Found Table Results ... </p>";
                echo "<table>";
                echo "<tr>
                <th>EID</th>
                <th> First Name </th>
                <th> Last Name </th>
                <th> Position </th>
                <th> SSN </th>
                <th> Password </th>
                <th> Years Worked </th>
                <th> Date of Birth </th>
                </tr>";
                // loop through the array and print out all the details
                foreach($employee_query_rows as $row){
                    $eid = $row['eid'];
                    echo "<td>" . $eid . "</td>";
                    $fname = $row['fname'];
                    echo "<td>" .$fname . "</td>";
                    $lname = $row['lname'];
                    echo "<td>" . $lname . "</td>";
                    $position = $row['position'];
                    echo "<td>" . $position . "</td>";
                    $ssn = $row['ssn'];
                    echo "<td>" . $ssn . "</td>";
                    $password = $row['password'];
                    echo "<td>" . $password . "</td>";
                    $years_worked = $row['years_worked'];
                    echo "<td>" . $years_worked . "</td>";
                    $DOB = $row['DOB'];
                    echo "<td>" . $DOB . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }else{
                echo "No data was found for this query !";
            }
        }catch(PDOException $e){
            echo "Query error in the admin page !";
        }
    }
    //q3: Order by DOB youngest to oldest
    if(isset($_POST['odobyo'])){
        try{
            // template query to select all employees
            $employee_template_query = "SELECT * FROM employee ORDER BY DOB DESC";
            // prepared select statement 
            $employee_prepared_statement = $database_connect->prepare($employee_template_query);
            // execute the prepared statement 
            $employee_prepared_statement->execute();

            // return all the rows
            $employee_query_rows = $employee_prepared_statement->fetchAll(PDO::FETCH_ASSOC);

            // if the query returns with results 
            if(count($employee_query_rows)>0){
                echo "<p> Successfully Found Table Results ... </p>";
                echo "<table>";
                echo "<tr>
                <th>EID</th>
                <th> First Name </th>
                <th> Last Name </th>
                <th> Position </th>
                <th> SSN </th>
                <th> Password </th>
                <th> Years Worked </th>
                <th> Date of Birth </th>
                </tr>";
                // loop through the array and print out all the details
                foreach($employee_query_rows as $row){
                    $eid = $row['eid'];
                    echo "<td>" . $eid . "</td>";
                    $fname = $row['fname'];
                    echo "<td>" .$fname . "</td>";
                    $lname = $row['lname'];
                    echo "<td>" . $lname . "</td>";
                    $position = $row['position'];
                    echo "<td>" . $position . "</td>";
                    $ssn = $row['ssn'];
                    echo "<td>" . $ssn . "</td>";
                    $password = $row['password'];
                    echo "<td>" . $password . "</td>";
                    $years_worked = $row['years_worked'];
                    echo "<td>" . $years_worked . "</td>";
                    $DOB = $row['DOB'];
                    echo "<td>" . $DOB . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }else{
                echo "No data was found for this query !";
            }
        }catch(PDOException $e){
            echo "Query error in the admin page !";
        }
    }
    //q4 View only Execs
    if(isset($_POST['onlyexecs'])){
        try{
            // template query to select all employees
            $employee_template_query = "SELECT * FROM employee WHERE position in ('CTO','CEO')";
            // prepared select statement 
            $employee_prepared_statement = $database_connect->prepare($employee_template_query);
            // execute the prepared statement 
            $employee_prepared_statement->execute();

            // return all the rows
            $employee_query_rows = $employee_prepared_statement->fetchAll(PDO::FETCH_ASSOC);

            // if the query returns with results 
            if(count($employee_query_rows)>0){
                echo "<p> Successfully Found Table Results ... </p>";
                echo "<table>";
                echo "<tr>
                <th>EID</th>
                <th> First Name </th>
                <th> Last Name </th>
                <th> Position </th>
                <th> SSN </th>
                <th> Password </th>
                <th> Years Worked </th>
                <th> Date of Birth </th>
                </tr>";
                // loop through the array and print out all the details
                foreach($employee_query_rows as $row){
                    $eid = $row['eid'];
                    echo "<td>" . $eid . "</td>";
                    $fname = $row['fname'];
                    echo "<td>" .$fname . "</td>";
                    $lname = $row['lname'];
                    echo "<td>" . $lname . "</td>";
                    $position = $row['position'];
                    echo "<td>" . $position . "</td>";
                    $ssn = $row['ssn'];
                    echo "<td>" . $ssn . "</td>";
                    $password = $row['password'];
                    echo "<td>" . $password . "</td>";
                    $years_worked = $row['years_worked'];
                    echo "<td>" . $years_worked . "</td>";
                    $DOB = $row['DOB'];
                    echo "<td>" . $DOB . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }else{
                echo "No data was found for this query !";
            }
        }catch(PDOException $e){
            echo "Query error in the admin page !";
        }
    }
    //q5 New Employee 
    if(isset($_POST["newemp"])){
        header("Location:admin/new_emp.php");
    }
    //q6 Update records 
    if(isset($_POST["upemp"])){
        header("Location:admin/update_emp.php");
    }
    //q7 Delete records
    if(isset($_POST["delemp"])){
        header("Location:admin/delete_emp.php");
    }
    
}

?>