<?php
session_start(); 
ob_start();

// close the session variable 
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['employee']);
unset($_SESSION['cid']);
// user arrangement 
unset($_SESSION['user_flower']);
unset($_SESSION['user_green']);
unset($_SESSION['user_sweet']);
unset($_SESSION['user_trink']);
unset($_SESSION['user_cont']);
// back to index.php
header("Location: index.php?logout=success");

// end the ob flush 
ob_end_flush();

// destroy the session
session_destroy();

?>