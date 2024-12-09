<link rel="stylesheet" href="../css/admin.css">
<?php

include 'connect_to_database.php';
$cid = $_SESSION['cid'];

// check for post 
if($_SERVER['REQUEST_METHOD'] == "POST"){
    //q1 Update records 
    if(isset($_POST["upcust"])){
        header("Location:up_cust.php");
    }
    //q2 Delete records
    if(isset($_POST["delcust"])){
        header("Location:del_cust.php");
    }
    // q3: View the address book
    if(isset($_POST['addall'])){
        try{
            // template query to select all employees
            $customer_template_query = "SELECT * FROM address WHERE cid=:cid";
            // prepared select statement 
            $customer_prepared_statement = $database_connect->prepare($customer_template_query);
            // execute the prepared statement 
            $customer_prepared_statement->execute(array("cid"=> $cid));
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
                echo '<p class="records_error"> No data was found ! </p>';
            }
        }catch(PDOException $e){
            echo '<p class="records_error"> SQL ERROR  ! </p>';
        }
    }
    // q4: Add new address 
    if(isset($_POST["addadd"])){
        header("Location:cust_add_new.php");
    } 
    // q4: Update Address
    if(isset($_POST["upadd"])){
        header("Location:cust_add_up.php");
    } 
    // q4: Delete Address
    if(isset($_POST["deladd"])){
        header("Location:cust_add_del.php");
    } 
}
