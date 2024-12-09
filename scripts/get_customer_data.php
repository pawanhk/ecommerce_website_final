<link rel="stylesheet" href="../css/login.css">
<?php
session_start();

include 'connect_to_database.php';

$email = $_SESSION['username'];

try{
    // template query to bind the username 
    $login_template_query = "SELECT * FROM customer WHERE email=:email";
    // prepared login statement 
    $login_prepared_statement = $database_connect->prepare($login_template_query);
    // execute the prepared statement and bind the eid and password
    $login_prepared_statement->execute(array("email"=> $email));

    // if the query returned with data, set the session variable
    if ($login_prepared_statement->rowCount() > 0) {
        $user_details = $login_prepared_statement->fetch(PDO::FETCH_ASSOC);
        $cid = $user_details['cid'];
        $fname = $user_details['fname'];
        $lname = $user_details['lname'];
        $phone = $user_details['phone'];
        $age = $user_details['AGE'];
    } 
    $_SESSION['cid'] = $cid;
}catch(PDOException $e){
echo "User details not found !";
}


?>