<?php
session_start(); 
ob_start();

// close the session variable 
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['employee']);

// back to index.php
header("Location: index.php?logout=success");

// end the ob flush 
ob_end_flush();

// destroy the session
session_destroy();

?>