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
        try{
            // template query to bind the username and password into
            $login_template_query = "SELECT * FROM employee WHERE eid=:username AND password=:password";
            // prepared login statement 
            $login_prepared_statement = $database_connect->prepare($login_template_query);
            // execute the prepared statement and bind the eid and password
            $login_prepared_statement->execute(array("username"=> $username,"password"=> $password));

            // if the query returned with data, set the session variable
            if($login_prepared_statement->rowCount()>0){
                //echo "User logged in !"; 
                $_SESSION["username"] = $username;
                header("Location:index.php?login=success");
            }else{
                echo '<p class="incorrect_login">Incorrect username or password, contact admin at pxk5296 </p>';
            }
        }catch(PDOException $e){
            echo "User could not log in !";
        }
    }
}

?>