<link rel="stylesheet" href="../css/login.css">
<?php

include 'connect_to_database.php';

// check for post 
if($_SERVER['REQUEST_METHOD'] == "POST"){
    // if the user or admin attempts to login
    if(isset($_POST['signup'])){
        // pass the signup details to the database
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        $age = $_POST['age'];

        // encrypt the password 
        $epass = password_hash($password, PASSWORD_DEFAULT);
        try{
            // template query to bind the username and password into
            $insert_template_query = "INSERT INTO customer(fname,lname,email,phone,password,age) 
            VALUES(:fname,:lname,:email,:phone,:password,:age)";
            // prepared signup statement 
            $insert_prepared_statement = $database_connect->prepare($insert_template_query);
            // execute the prepared statement 
            $insert_prepared_statement->execute(array(
                "fname"=>$fname,
                "lname"=>$lname,
                "email"=>$email,
                "phone"=>$phone,
                "password"=>$epass,
                "age"=>$age));

            // if the query returned with data, set the session variable
            if($insert_prepared_statement->rowCount() > 0){
                $_SESSION["username"] = $email;
                header("Location: index.php?signup=success");
            }else{
                echo '<p class="records_error"> Some of the form data is invalid ! </p>';
            }
        }catch(PDOException $e){
            echo $e->getMessage();
            echo '<p class="records_error"> Query Error in the adming page 1 !</p>';
        }
    }
}

?>