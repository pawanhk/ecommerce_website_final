<?php
include 'connect_to_database.php';

// store the session variable
$username =  $_SESSION['username'];

try{
	// template query to bind the username and password into
	$admin_template_query = "SELECT * FROM employee WHERE eid=:username";
	// prepared login statement 
	$admin_prepared_statement = $database_connect->prepare($admin_template_query);
	// execute the prepared statement and bind the eid and password
	$admin_prepared_statement->execute(array("username"=> $username));

	if($admin_prepared_statement->rowCount()>0){
		echo "User exists and is logged in, set the eid !"; 
		$logged_in_user_row = $admin_prepared_statement->fetch(PDO::FETCH_ASSOC);
		if(!$logged_in_user_row){
			echo "User's row does not exist ?";
		}else{
			$eid = $row['eid'];
		}
		// move the user back to the login page 
		header("Location:index.php?login=success");
	}
}catch(PDOException $e){
	echo "Could not verify if the user logged in or not !";
}
 

?>