<?php
session_start(); 
include 'scripts/connect_to_database.php';
include 'base.php';
if(!$username){
    header("Location: index.php?noaccess");
}
?>

