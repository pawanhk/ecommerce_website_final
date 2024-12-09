<link rel="stylesheet" href="../css/login.css">
<?php
session_start();

include 'connect_to_database.php';

$eid = $_SESSION['username'];

try{
    // template query to bind the username 
    $login_template_query = "SELECT * FROM employee WHERE eid=:username";
    // prepared login statement 
    $login_prepared_statement = $database_connect->prepare($login_template_query);
    // execute the prepared statement and bind the eid and password
    $login_prepared_statement->execute(array("username"=> $eid));

    // if the query returned with data, set the session variable
    if ($login_prepared_statement->rowCount() > 0) {
        $user_details = $login_prepared_statement->fetch(PDO::FETCH_ASSOC);
        $fname = $user_details['fname'];
        $lname = $user_details['lname'];
        $position = $user_details['position'];
        $years_worked = $user_details['years_worked'];
        $dob = $user_details['DOB'];
    } 
}catch(PDOException $e){
echo "User details not found !";
}


?>