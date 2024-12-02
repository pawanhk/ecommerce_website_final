<?php
include 'scripts/connect_to_database.php';
?>

<html>
<head>
    <title> Papar Flower Shop </title>
</head>
<body>
<h1> This is a flower shop - if you are seeing this its too early ! come back in a week </h1>



<h2> Customer List: </h2>

<?php


// print out all the customers from the customers table
$test_query = "select fname,lname from customer";
$send_query = $database_connect->query($test_query);

    
// if the query has any results 
if ($send_query->num_rows > 0){
    // print out all the results
    while($tuple = $send_query->fetch_assoc()){
        echo "fname: " . $tuple["fname"] . "</br>";
        echo "lname: " . $tuple["lname"] . "</br>";
        echo "<br>";
    }
}else{
  echo "no customers, this shouldnt happen check the table or connection script";
}

?>


</body>
</html>

<?php
include 'scripts/disconnect_from_database.php';
?>