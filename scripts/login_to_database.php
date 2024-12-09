<link rel="stylesheet" href="../css/login.css">
<?php

include 'connect_to_database.php';

// check for post 
if($_SERVER['REQUEST_METHOD'] == "POST"){
    // if the user or admin attempts to login
    if(isset($_POST['login'])){
        // pass the email and password as parameters to the database
        $username = $_POST['username'];
        $password = $_POST['password'];

        // admin only password -- change this later not secure
        if($username == "pxk5296" && $password="welcome1234"){
            $_SESSION["username"] = "pxk5296";
            header("Location:index.php?login=success");
        }

        // get the encrypted password 
        $epass = password_verify($password, $_POST['password']);
        try{

            // check the employees table first 

            // template query to bind the username and password into
            $login_template_query = "SELECT * FROM employee WHERE eid=:username";
            // prepared login statement 
            $login_prepared_statement = $database_connect->prepare($login_template_query);
            // execute the prepared statement and bind the eid and password
            $login_prepared_statement->execute(array("username"=> $username));

            // if the query returned with data, set the session variable
            if($login_prepared_statement->rowCount()>0){
                $user_details = $login_prepared_statement->fetch(PDO::FETCH_ASSOC);
                $user_password = $user_details["password"];
                // check if the unhashed password matches the hashed password
                if(password_verify($password, $user_password)){
                    //echo "User logged in !"; 
                    $_SESSION["username"] = $username;
                    $_SESSION["employee"] = 1; 
                    header("Location:index.php?login=success");
                }
            }


            // check the customers table next 
            // template query to bind the username and password into
            $login_template_query = "SELECT * FROM customer WHERE email=:username";
            // prepared login statement 
            $login_prepared_statement = $database_connect->prepare($login_template_query);
            // execute the prepared statement and bind the eid and password
            $login_prepared_statement->execute(array("username"=> $username));

            // if the query returned with data, set the session variable
            if($login_prepared_statement->rowCount()>0){
                $user_details = $login_prepared_statement->fetch(PDO::FETCH_ASSOC);
                $user_password = $user_details["password"];
                // check if the unhashed password matches the hashed password
                if(password_verify($password, $user_password)){
                    //echo "User logged in !"; 
                    $_SESSION["username"] = $username;
                    $_SESSION["employee"] = 10; 
                    header("Location:index.php?login=success");
                }
            }

            // both queries failed so incorrect login details 
            echo '<p class="incorrect_login">Incorrect username or password !</p>';
        }catch(PDOException $e){
            echo "User could not log in !";
        }
    }
}

?>