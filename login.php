<?php
include 'scripts/connect_to_database.php';
include 'base.php';

// start a php session
ob_start();
session_start();
?>

 

<div class="login-form">
    <h1> Welcome Back ! </h1>
    <form method="POST">
        <h3> Email </h3>    
        <input type="text" name="username">

        <h3> Password </h3>
        <input type="password" name="password">

        <button name="login" type="submit">Sign In </button>
    </form>
</div>

<?php 
// add checks here for form verification: 
include 'scripts/login_to_database.php'

?>




</body>
</html>

<?php
ob_end_flush();
?>