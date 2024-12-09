<?php
session_start();

$user = $_SESSION['cid'];
$user_flower = $_SESSION['user_flower'];
$user_green = $_SESSION['user_green'];
$user_sweet = $_SESSION['user_sweet'];
$user_trinket = $_SESSION['user_trink'];
$user_container = $_SESSION['user_cont'];

include 'connect_to_database.php';

try{
    // template query to bind the username and password into
    $insert_template_query = "INSERT INTO arrangements(cid,inv_id,gid,tid,sid,con_id) 
    VALUES(:cid,:inv_id,:gid,:tid,:sid,:con_id)";
    // prepared signup statement 
    $insert_prepared_statement = $database_connect->prepare($insert_template_query);
    // execute the prepared statement 
    $insert_prepared_statement->execute(array(
        "cid"=>$user,
        "inv_id"=>$user_flower,
        "gid"=>$user_green,
        "tid"=>$user_trinket,
        "sid"=>$user_green,
        "con_id"=>$user_container));

    // if the query returned with data, set the session variable
    if($insert_prepared_statement->rowCount() > 0){
        header("Location: ../shopping_cart.php?arrangement=success");
    }else{
        echo '<p class="records_error"> error in arrangements table ! </p>';
    }
}catch(PDOException $e){
    echo $e->getMessage();
    echo '<p class="records_error"> Query Error in the adming page 1 !</p>';
}


?>