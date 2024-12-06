<?php

// database info 
$host = "localhost";
$port = 3307;
$host_username = "root";
$host_password = "";
$database_name = "flower_shop";

// handle the connection exception
try{
    // create the PDO connection object
    $database_connect = new PDO("mysql:host=$host;dbname=$database_name;port=$port",$host_username,$host_password);
    // set the PDO error reporting mode
    $database_connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "Could not connect to the databas !";
}


?>