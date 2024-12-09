<link rel="stylesheet" href="../css/admin.css">
<?php

include 'connect_to_database.php';

// check for post 
if($_SERVER['REQUEST_METHOD'] == "POST"){
    // q1: All Employees
    if(isset($_POST['allcust'])){
        try{
            // template query to select all employees
            $customer_template_query = "SELECT * FROM customer";
            // prepared select statement 
            $customer_prepared_statement = $database_connect->prepare($customer_template_query);
            // execute the prepared statement 
            $customer_prepared_statement->execute();

            // return all the rows
            $customer_query_rows = $customer_prepared_statement->fetchAll(PDO::FETCH_ASSOC);

            // if the query returns with results 
            if(count($customer_query_rows)>0){
                echo "<p> Successfully Found Table Results ... </p>";
                echo "<table>";
                echo "<tr>
                <th>CID</th>
                <th> First Name </th>
                <th> Last Name </th>
                <th> Email </th>
                <th> Phone </th>
                <th> Age </th>
                </tr>";
                // loop through the array and print out all the details
                foreach($customer_query_rows as $row){
                    $cid = $row['cid'];
                    echo "<td>" . $cid . "</td>";
                    $fname = $row['fname'];
                    echo "<td>" .$fname . "</td>";
                    $lname = $row['lname'];
                    echo "<td>" . $lname . "</td>";
                    $email = $row['email'];
                    echo "<td>" . $email . "</td>";
                    $phone = $row['phone'];
                    echo "<td>" . $phone . "</td>";
                    $age = $row['AGE'];
                    echo "<td>" . $age . "</td>";
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
    // q2: Group by Age
    if(isset($_POST['grbyage'])){
        try{
            // template query to select all employees
            $customer_template_query = "SELECT AGE,COUNT(cid) AS CID FROM customer GROUP BY AGE";
            // prepared select statement 
            $customer_prepared_statement = $database_connect->prepare($customer_template_query);
            // execute the prepared statement 
            $customer_prepared_statement->execute();

            // return all the rows
            $customer_query_rows = $customer_prepared_statement->fetchAll(PDO::FETCH_ASSOC);

            // if the query returns with results 
            if(count($customer_query_rows)>0){
                echo "<p> Successfully Found Table Results ... </p>";
                echo "<table>";
                echo "<tr>
                <th> Customers Count </th>
                <th> Age Group </th>
                </tr>";
                // loop through the array and print out all the details
                foreach($customer_query_rows as $row){
                    $customer_count = $row['CID'];
                    echo "<td>" . $customer_count . "</td>";
                    $age = $row['AGE'];
                    echo "<td>" . $age . "</td>";
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
    // q3: Address Book 
    if(isset($_POST['alladd'])){
        try{
            // template query to select all employees
            $customer_template_query = "SELECT * FROM address";
            // prepared select statement 
            $customer_prepared_statement = $database_connect->prepare($customer_template_query);
            // execute the prepared statement 
            $customer_prepared_statement->execute();
            // return all the rows
            $customer_query_rows = $customer_prepared_statement->fetchAll(PDO::FETCH_ASSOC);

            // if the query returns with results 
            if(count($customer_query_rows)>0){
                echo "<p> Successfully Found Table Results ... </p>";
                echo "<table>";
                echo "<tr>
                <th>AID</th>
                <th> CID </th>
                <th> Primary </th>
                <th> Secondary </th>
                <th> City </th>
                <th> State </th>
                <th> ZIP </th>
                </tr>";
                // loop through the array and print out all the details
                foreach($customer_query_rows as $row){
                    $aid = $row['add_id'];
                    echo "<td>" . $aid . "</td>";
                    $cid = $row['cid'];
                    echo "<td>" . $cid . "</td>";
                    $padd = $row['primary_add'];
                    echo "<td>" .$padd . "</td>";
                    $sadd = $row['secondary_add'];
                    echo "<td>" .$sadd . "</td>";
                    $city = $row['city'];
                    echo "<td>" . $city . "</td>";
                    $state = $row['state'];
                    echo "<td>" . $state . "</td>";
                    $zip = $row['zip'];
                    echo "<td>" . $zip . "</td>";
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
    // q4: Group by ZIP
    if(isset($_POST['grbyzip'])){
        try{
            // template query to select all employees
            $customer_template_query = "SELECT zip,COUNT(zip) AS ZIP FROM address GROUP BY zip";
            // prepared select statement 
            $customer_prepared_statement = $database_connect->prepare($customer_template_query);
            // execute the prepared statement 
            $customer_prepared_statement->execute();

            // return all the rows
            $customer_query_rows = $customer_prepared_statement->fetchAll(PDO::FETCH_ASSOC);

            // if the query returns with results 
            if(count($customer_query_rows)>0){
                echo "<p> Successfully Found Table Results ... </p>";
                echo "<table>";
                echo "<tr>
                <th> Customers Count </th>
                <th> ZIP Group </th>
                </tr>";
                // loop through the array and print out all the details
                foreach($customer_query_rows as $row){
                    $customer_count = $row['ZIP'];
                    echo "<td>" . $customer_count . "</td>";
                    $age = $row['zip'];
                    echo "<td>" . $age . "</td>";
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
    //q5 Update records 
    if(isset($_POST["upcust"])){
        header("Location:admin/update_cust.php");
    }
    //q6 Delete records
    if(isset($_POST["delcust"])){
        header("Location:admin/delete_cust.php");
    }
    
}
