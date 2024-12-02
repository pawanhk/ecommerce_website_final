<?php

// database info 
$host = "localhost";
$port = 3307;
$host_username = "root";
$host_password = "";
$database_name = "flower_shop";

// create a new mysqli object and connect to the localhost
$database_connect = new mysqli($host,$host_username,$host_password,$database_name,$port);

if($database_connect->connect_error){
    die("Connection is wrong, check the connection script " . $database_connect->connect_error);
}else{
    echo "<p style='color:green;'>Connected to Database, delete this check later</p>";
}

?>