<link rel="stylesheet" href="../css/login.css">
<?php

include 'connect_to_database.php';

// check for post 
if($_SERVER['REQUEST_METHOD'] == "POST"){
    // if the user or adming attempts to login
    if(isset($_POST['login'])){
        // pass the email and password as parameters to the database
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM employee WHERE eid='$username' AND password='$password'";
        $result = mysqli_query($database_connect,$sql);
        if(mysqli_num_rows($result)>0){
                echo "Success !";
                // check the session variables against user entered details
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                header("Location:index.php?login=success");
        }else{
            echo '  <p class="incorrect_login">Incorrect username or password, contact admin at pxk5296 </p>';
        }
    }
}

?>