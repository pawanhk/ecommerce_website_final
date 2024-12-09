<?php
include 'scripts/connect_to_database.php';
include 'base.php';

// start a php session
ob_start();
session_start();
?>

 
<div class="login-form">
    <h1>Welcome To The MK Floral Community </h1>
    <form method="POST">
        <h3> First Name </h3>    
        <input type="text" name="fname">

        <h3> Last Name </h3>
        <input type="text" name="lname">

        <h3> Email </h3>    
        <input type="email" name="email">

        <h3> Password </h3>    
        <input type="password" name="password">

        <h3> Phone Number </h3>    
        <input type="text" name="phone">

        <h3> Age </h3>    
        <input type="text" name="age">
        

        <button name="signup" type="submit"> Sign Up </button>
    </form>
</div>

<?php 
// add checks here for form verification: 
include 'scripts/signup_to_database.php'


?>




</body>
</html>

<?php
ob_end_flush();
?>