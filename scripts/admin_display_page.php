<?php
include 'connect_to_database.php';

// store the session variable
$username =  $_SESSION['username'];

// get the user's details to check admin status
$query = "SELECT * FROM employee WHERE eid='$username'";

$result = mysqli_query($database_connect,$query);
if(mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_assoc($result)){
		$eid = $row['eid'];
	}
}   

?>