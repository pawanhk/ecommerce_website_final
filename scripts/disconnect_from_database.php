<?php

// get the connection script if it does not exist
include_once 'connect_to_database.php';

// close the connection
$database_connect->close();
echo "<p style='color:green;'> closed connection to database, delete this check later</p>";
 
?>