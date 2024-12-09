<?php

$cid = $_SESSION['cid'];

include 'connect_to_database.php';

try{
    // template query to bind the username 
    $arr_template_query = "SELECT * FROM arrangements WHERE cid=:cid";
    // prepared login statement 
    $arr_prepared_statement = $database_connect->prepare($arr_template_query);
    // execute the prepared statement and bind the eid and password
    $arr_prepared_statement->execute(array("cid"=> $cid));
    if($arr_prepared_statement->rowCount() > 0){
        $counter = 1;
        $price = 0;
        foreach($arr_prepared_statement->fetchAll(PDO::FETCH_ASSOC) as $arr_details){
            // get the arr info first
            $curr_price = 0;
            $inv_id = $arr_details["inv_id"];
            $gid = $arr_details["gid"];
            $tid = $arr_details['tid'];
            $sid = $arr_details['sid'];
            $con_id = $arr_details['con_id'];

            // get the inventory info 
            if($inv_id){
                // template query to bind the username 
                $arr_template_query = "SELECT * FROM inventory WHERE inv_id=:inv_id";
                // prepared login statement 
                $arr_prepared_statement = $database_connect->prepare($arr_template_query);
                // execute the prepared statement and bind the eid and password
                $arr_prepared_statement->execute(array("inv_id"=> $inv_id));

                if($arr_prepared_statement->rowCount() > 0){
                    $inv_detail = $arr_prepared_statement->fetch(PDO::FETCH_ASSOC);
                    $iname = $inv_detail["name"];
                    $iseason = $inv_detail["season"];
                    $icolor = $inv_detail['color'];
                    $iprice = $inv_detail['price'];
                }else{
                    echo '<p class="records_error"> Flowers out of stock ! </p>';
                    exit();
                }
            }

            // get the greens info
            if($gid){
                // template query to bind the username 
                $arr_template_query = "SELECT * FROM greens WHERE gid=:gid";
                // prepared login statement 
                $arr_prepared_statement = $database_connect->prepare($arr_template_query);
                // execute the prepared statement and bind the eid and password
                $arr_prepared_statement->execute(array("gid"=> $gid));

                if($arr_prepared_statement->rowCount() > 0){
                    $green_detail = $arr_prepared_statement->fetch(PDO::FETCH_ASSOC);
                    $gname = $green_detail["name"];
                    $gseason = $green_detail["season"];
                    $gcolor = $green_detail['color'];
                    $gprice = $green_detail['price'];
                }else{
                    echo '<p class="records_error"> Greens out of stock ! </p>';
                    exit();
                }
            }

            // get the trinkets info
            if($tid){
                // template query to bind the username 
                $arr_template_query = "SELECT * FROM trinkets WHERE tid=:tid";
                // prepared login statement 
                $arr_prepared_statement = $database_connect->prepare($arr_template_query);
                // execute the prepared statement and bind the eid and password
                $arr_prepared_statement->execute(array("tid"=> $tid));

                if($arr_prepared_statement->rowCount() > 0){
                    $trink_detail = $arr_prepared_statement->fetch(PDO::FETCH_ASSOC);
                    $tname = $trink_detail["name"];
                    $tevent = $trink_detail["event"];
                    $tcolor = $trink_detail['color'];
                    $tprice = $trink_detail['price'];
                }else{
                    echo '<p class="records_error"> Trinkets out of stock ! </p>';
                    exit();
                }
            }

            // get the sweets info
            if($sid){
                // template query to bind the username 
                $arr_template_query = "SELECT * FROM sweets WHERE sid=:sid";
                // prepared login statement 
                $arr_prepared_statement = $database_connect->prepare($arr_template_query);
                // execute the prepared statement and bind the eid and password
                $arr_prepared_statement->execute(array("sid"=> $sid));

                if($arr_prepared_statement->rowCount() > 0){
                    $sweet_detail = $arr_prepared_statement->fetch(PDO::FETCH_ASSOC);
                    $sname = $sweet_detail["name"];
                    $scolor = $sweet_detail["color"];
                    $sshape = $sweet_detail['shape'];
                    $sprice = $sweet_detail['price'];
                }else{
                    echo '<p class="records_error"> Sweets out of stock ! </p>';
                    exit();
                }
            }
            // get the sweets info
            if($con_id){
                // template query to bind the username 
                $arr_template_query = "SELECT * FROM containers WHERE con_id=:con_id";
                // prepared login statement 
                $arr_prepared_statement = $database_connect->prepare($arr_template_query);
                // execute the prepared statement and bind the eid and password
                $arr_prepared_statement->execute(array("con_id"=> $con_id));

                if($arr_prepared_statement->rowCount() > 0){
                    $con_detail = $arr_prepared_statement->fetch(PDO::FETCH_ASSOC);
                    $coname = $con_detail["name"];
                    $ccolor = $con_detail["color"];
                    $csize = $con_detail['size'];
                    $cprice = $con_detail['price'];
                }else{
                    echo '<p class="records_error"> Containers out of stock ! </p>';
                    exit();
                }
            }
            
            $curr_price = $iprice + $gprice + $sprice + $tprice + $cprice;
            $price += $curr_price;
            // print out the details
            echo '
            <div class="cart">
                <div clas="cart-item">
                ' . $counter . ".) " . $iname . " - " . $gcolor . " - " . $iseason . " " . "Arrangement".'
                </div>
                <div clas="cart-price">
                ' . "" . $curr_price . "$".'
                </div>
            </div>
            <hr>
            ';
            
            $counter += 1;
        }
    }

    
}catch(PDOException $e){
echo "User details not found !";
}


?>