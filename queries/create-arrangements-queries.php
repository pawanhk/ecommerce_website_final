<link rel="stylesheet" href="../css/admin.css">
<link rel="stylesheet" href="../css/arr.css">
<?php
session_start();

include 'connect_to_database.php';
$cid = $_SESSION['cid'];

// check for post 
if($_SERVER['REQUEST_METHOD'] == "POST"){
    //q1 view all flowers
    if(isset($_POST["allflowers"])){
        try{
            // template query to bind the username and password into
            $arr_template_query = "SELECT * FROM inventory";
            $arr_prepared_statement = $database_connect->prepare($arr_template_query);
            // execute the prepared statement and bind the eid and password
            $arr_prepared_statement->execute();
        
            if ($arr_prepared_statement->rowCount() > 0) {
                // Print out all the flowers in a specific order
                echo '<div class="flower-box">';
                foreach ($arr_prepared_statement->fetchAll(PDO::FETCH_ASSOC) as $arr_item) {
                    echo '
                        <div class="box-item">
                            <form method="POST">
                            <input type="hidden" name="userflower" value="'. $arr_item['inv_id'] .'">
                            <button type="submit" name="fselect"><img src="images/temp_flower.png"></button>
                            </form>
                            <h3>' . $arr_item['name'] . " " . $arr_item['color'] . '</h3>
                            <h3> $' .  $arr_item['price'] . ' (' . $arr_item['size'] . ')' . '</h3>
                        </div>
                    ';
                }
                echo '</div>';
            }
        }catch(PDOException $e){
            echo "Could not verify if the user logged in or not !";
        }
    }
    //q1 price lowest to highest
    if(isset($_POST["pricelo"])){
        try{
            // template query to bind the username and password into
            $arr_template_query = "SELECT * FROM inventory ORDER BY price";
            $arr_prepared_statement = $database_connect->prepare($arr_template_query);
            // execute the prepared statement and bind the eid and password
            $arr_prepared_statement->execute();
        
            if ($arr_prepared_statement->rowCount() > 0) {
                // Print out all the flowers in a specific order
                echo '<div class="flower-box">';
                foreach ($arr_prepared_statement->fetchAll(PDO::FETCH_ASSOC) as $arr_item) {
                    echo '
                        <div class="box-item">
                            <form method="POST">
                            <input type="hidden" name="userflower" value="'. $arr_item['inv_id'] .'">
                            <button type="submit" name="fselect"><img src="images/temp_flower.png"></button>
                            </form>
                            <h3>' . $arr_item['name'] . " " . $arr_item['color'] . '</h3>
                            <h3> $' .  $arr_item['price'] . ' (' . $arr_item['size'] . ')' . '</h3>
                        </div>
                    ';
                }
                echo '</div>';
            }
        }catch(PDOException $e){
            echo "Could not verify if the user logged in or not !";
        }
    }
        //q1 price lowest to highest
    if(isset($_POST["pricehi"])){
        try{
            // template query to bind the username and password into
            $arr_template_query = "SELECT * FROM inventory ORDER BY price DESC";
            $arr_prepared_statement = $database_connect->prepare($arr_template_query);
            // execute the prepared statement and bind the eid and password
            $arr_prepared_statement->execute();
        
            if ($arr_prepared_statement->rowCount() > 0) {
                // Print out all the flowers in a specific order
                echo '<div class="flower-box">';
                foreach ($arr_prepared_statement->fetchAll(PDO::FETCH_ASSOC) as $arr_item) {
                    echo '
                        <div class="box-item">
                            <form method="POST">
                            <input type="hidden" name="userflower" value="'. $arr_item['inv_id'] .'">
                            <button type="submit" name="fselect"><img src="images/temp_flower.png"></button>
                            </form>
                            <h3>' . $arr_item['name'] . " " . $arr_item['color'] . '</h3>
                            <h3> $' .  $arr_item['price'] . ' (' . $arr_item['size'] . ')' . '</h3>
                        </div>
                    ';
                }
                echo '</div>';
            }
        }catch(PDOException $e){
            echo "Could not verify if the user logged in or not !";
        }
    }
    // q1 -- continue, user selects a flower
    if(isset($_POST["fselect"])){
        // get the flower 
        $user_flower = $_POST["userflower"];
        $_SESSION['user_flower'] = $user_flower;
        if($_SESSION['user_flower']){
            header("Location: arr1.php");
        }else{
            echo "Make a selecton to proceed !";
        }
    }

    // q2 view all greens
    if(isset($_POST["allgreens"])){
        try{
            // template query to bind the username and password into
            $arr_template_query = "SELECT * FROM greens";
            $arr_prepared_statement = $database_connect->prepare($arr_template_query);
            // execute the prepared statement and bind the eid and password
            $arr_prepared_statement->execute();
        
            if ($arr_prepared_statement->rowCount() > 0) {
                // Print out all the flowers in a specific order
                echo '<div class="flower-box">';
                foreach ($arr_prepared_statement->fetchAll(PDO::FETCH_ASSOC) as $arr_item) {
                    echo '
                        <div class="box-item">
                            <form method="POST">
                            <input type="hidden" name="usergreen" value="'. $arr_item['gid'] .'">
                            <button type="submit" name="gselect"><img src="images/temp_leaf.png"></button>
                            </form>
                            <h3>' . $arr_item['name'] . " " . $arr_item['color'] . '</h3>
                            <h3> $' .  $arr_item['price'] . ' (' . $arr_item['size'] . ')' . '</h3>
                        </div>
                    ';
                }
                echo '</div>';
            }
        }catch(PDOException $e){
            echo "Could not verify if the user logged in or not !";
        }
    }
    // q2 -- contine, skip the user to the next page
    if(isset($_POST["gskip"])){
        $_SESSION['user_green'] = 0;
        header("Location: arr2.php");
    }
    //q2 price lowest to highest
    if(isset($_POST["gpricelo"])){
        try{
            // template query to bind the username and password into
            $arr_template_query = "SELECT * FROM greens ORDER BY price";
            $arr_prepared_statement = $database_connect->prepare($arr_template_query);
            // execute the prepared statement and bind the eid and password
            $arr_prepared_statement->execute();
        
            if ($arr_prepared_statement->rowCount() > 0) {
                // Print out all the flowers in a specific order
                echo '<div class="flower-box">';
                foreach ($arr_prepared_statement->fetchAll(PDO::FETCH_ASSOC) as $arr_item) {
                    echo '
                        <div class="box-item">
                            <form method="POST">
                            <input type="hidden" name="usergreen" value="'. $arr_item['gid'] .'">
                            <button type="submit" name="gselect"><img src="images/temp_leaf.png"></button>
                            </form>
                            <h3>' . $arr_item['name'] . " " . $arr_item['color'] . '</h3>
                            <h3> $' .  $arr_item['price'] . ' (' . $arr_item['size'] . ')' . '</h3>
                        </div>
                    ';
                }
                echo '</div>';
            }
        }catch(PDOException $e){
            echo "Could not verify if the user logged in or not !";
        }
    }
     //q2 price lowest to highest
    if(isset($_POST["gpricehi"])){
        try{
            // template query to bind the username and password into
            $arr_template_query = "SELECT * FROM greens ORDER BY price DESC";
            $arr_prepared_statement = $database_connect->prepare($arr_template_query);
            // execute the prepared statement and bind the eid and password
            $arr_prepared_statement->execute();
        
            if ($arr_prepared_statement->rowCount() > 0) {
                // Print out all the flowers in a specific order
                echo '<div class="flower-box">';
                foreach ($arr_prepared_statement->fetchAll(PDO::FETCH_ASSOC) as $arr_item) {
                    echo '
                        <div class="box-item">
                            <form method="POST">
                            <input type="hidden" name="usergreen" value="'. $arr_item['gid'] .'">
                            <button type="submit" name="gselect"><img src="images/temp_leaf.png"></button>
                            </form>
                            <h3>' . $arr_item['name'] . " " . $arr_item['color'] . '</h3>
                            <h3> $' .  $arr_item['price'] . ' (' . $arr_item['size'] . ')' . '</h3>
                        </div>
                    ';
                }
                echo '</div>';
            }
        }catch(PDOException $e){
            echo "Could not verify if the user logged in or not !";
        }
    }
    // q2 -- continue, user selects a green
    if(isset($_POST["gselect"])){
        // get the flower 
        $user_green = $_POST["usergreen"];
        $_SESSION['user_green'] = $user_green;
        if($_SESSION['user_green']){
            header("Location: arr2.php");
        }
    }



    // q3 view all sweets
    if(isset($_POST["allsweets"])){
        try{
            // template query to bind the username and password into
            $arr_template_query = "SELECT * FROM sweets";
            $arr_prepared_statement = $database_connect->prepare($arr_template_query);
            // execute the prepared statement and bind the eid and password
            $arr_prepared_statement->execute();
        
            if ($arr_prepared_statement->rowCount() > 0) {
                // Print out all the flowers in a specific order
                echo '<div class="flower-box">';
                foreach ($arr_prepared_statement->fetchAll(PDO::FETCH_ASSOC) as $arr_item) {
                    echo '
                        <div class="box-item">
                            <form method="POST">
                            <input type="hidden" name="usergreen" value="'. $arr_item['sid'] .'">
                            <button type="submit" name="sselect"><img src="images/sweet.png"></button>
                            </form>
                            <h3>' . $arr_item['name'] . " " . $arr_item['color'] . '</h3>
                            <h3> $' .  $arr_item['price'] . ' (' . $arr_item['size'] . ')' . '</h3>
                        </div>
                    ';
                }
                echo '</div>';
            }
        }catch(PDOException $e){
            echo "Could not verify if the user logged in or not !";
        }
    }
    // q3 -- contine, skip the user to the next page
    if(isset($_POST["sskip"])){
        $_SESSION['user_sweet'] = 0;
        header("Location: arr3.php");
    }
    //q3 price lowest to highest
    if(isset($_POST["spricelo"])){
        try{
            // template query to bind the username and password into
            $arr_template_query = "SELECT * FROM sweets ORDER BY price";
            $arr_prepared_statement = $database_connect->prepare($arr_template_query);
            // execute the prepared statement and bind the eid and password
            $arr_prepared_statement->execute();
        
            if ($arr_prepared_statement->rowCount() > 0) {
                // Print out all the flowers in a specific order
                echo '<div class="flower-box">';
                foreach ($arr_prepared_statement->fetchAll(PDO::FETCH_ASSOC) as $arr_item) {
                    echo '
                        <div class="box-item">
                            <form method="POST">
                            <input type="hidden" name="usersweet" value="'. $arr_item['sid'] .'">
                            <button type="submit" name="sselect"><img src="images/sweet.png"></button>
                            </form>
                            <h3>' . $arr_item['name'] . " " . $arr_item['color'] . '</h3>
                            <h3> $' .  $arr_item['price'] . ' (' . $arr_item['size'] . ')' . '</h3>
                        </div>
                    ';
                }
                echo '</div>';
            }
        }catch(PDOException $e){
            echo "Could not verify if the user logged in or not !";
        }
    }
     //q3 price lowest to highest
    if(isset($_POST["spricehi"])){
        try{
            // template query to bind the username and password into
            $arr_template_query = "SELECT * FROM sweets ORDER BY price DESC";
            $arr_prepared_statement = $database_connect->prepare($arr_template_query);
            // execute the prepared statement and bind the eid and password
            $arr_prepared_statement->execute();
        
            if ($arr_prepared_statement->rowCount() > 0) {
                // Print out all the flowers in a specific order
                echo '<div class="flower-box">';
                foreach ($arr_prepared_statement->fetchAll(PDO::FETCH_ASSOC) as $arr_item) {
                    echo '
                        <div class="box-item">
                            <form method="POST">
                            <input type="hidden" name="usersweet" value="'. $arr_item['sid'] .'">
                            <button type="submit" name="sselect"><img src="images/sweet.png"></button>
                            </form>
                            <h3>' . $arr_item['name'] . " " . $arr_item['color'] . '</h3>
                            <h3> $' .  $arr_item['price'] . ' (' . $arr_item['size'] . ')' . '</h3>
                        </div>
                    ';
                }
                echo '</div>';
            }
        }catch(PDOException $e){
            echo "Could not verify if the user logged in or not !";
        }
    }
    // q3 -- continue, user selects a sweet
    if(isset($_POST["sselect"])){
        // get the flower 
        $user_sweet = $_POST["usersweet"];
        $_SESSION['user_sweet'] = $user_sweet;
        if($_SESSION['user_sweet']){
            header("Location: arr3.php");
        }
    }


    // q4 view all trinkets
    if(isset($_POST["alltrinks"])){
        try{
            // template query to bind the username and password into
            $arr_template_query = "SELECT * FROM trinkets";
            $arr_prepared_statement = $database_connect->prepare($arr_template_query);
            // execute the prepared statement and bind the eid and password
            $arr_prepared_statement->execute();
        
            if ($arr_prepared_statement->rowCount() > 0) {
                // Print out all the flowers in a specific order
                echo '<div class="flower-box">';
                foreach ($arr_prepared_statement->fetchAll(PDO::FETCH_ASSOC) as $arr_item) {
                    echo '
                        <div class="box-item">
                            <form method="POST">
                            <input type="hidden" name="usertrink" value="'. $arr_item['tid'] .'">
                            <button type="submit" name="tselect"><img src="images/temp_trink.png"></button>
                            </form>
                            <h3>' . $arr_item['name'] . " " . $arr_item['color'] . '</h3>
                            <h3> $' .  $arr_item['price'] . ' (' . $arr_item['size'] . ')' . '</h3>
                        </div>
                    ';
                }
                echo '</div>';
            }
        }catch(PDOException $e){
            echo "Could not verify if the user logged in or not !";
        }
    }
    // q4 -- contine, skip the user to the next page
    if(isset($_POST["tskip"])){
        $_SESSION['user_trink'] = 0;
        header("Location: arr4.php");
    }
    // q4 price lowest to highest
    if(isset($_POST["tpricelo"])){
        try{
            // template query to bind the username and password into
            $arr_template_query = "SELECT * FROM trinkets ORDER BY price";
            $arr_prepared_statement = $database_connect->prepare($arr_template_query);
            // execute the prepared statement and bind the eid and password
            $arr_prepared_statement->execute();
        
            if ($arr_prepared_statement->rowCount() > 0) {
                // Print out all the flowers in a specific order
                echo '<div class="flower-box">';
                foreach ($arr_prepared_statement->fetchAll(PDO::FETCH_ASSOC) as $arr_item) {
                    echo '
                        <div class="box-item">
                            <form method="POST">
                            <input type="hidden" name="usertrink" value="'. $arr_item['tid'] .'">
                            <button type="submit" name="tselect"><img src="images/temp_trink.png"></button>
                            </form>
                            <h3>' . $arr_item['name'] . " " . $arr_item['color'] . '</h3>
                            <h3> $' .  $arr_item['price'] . ' (' . $arr_item['size'] . ')' . '</h3>
                        </div>
                    ';
                }
                echo '</div>';
            }
        }catch(PDOException $e){
            echo "Could not verify if the user logged in or not !";
        }
    }
    // q4 price lowest to highest
    if(isset($_POST["tpricehi"])){
        try{
            // template query to bind the username and password into
            $arr_template_query = "SELECT * FROM trinkets ORDER BY price DESC";
            $arr_prepared_statement = $database_connect->prepare($arr_template_query);
            // execute the prepared statement and bind the eid and password
            $arr_prepared_statement->execute();
        
            if ($arr_prepared_statement->rowCount() > 0) {
                // Print out all the flowers in a specific order
                echo '<div class="flower-box">';
                foreach ($arr_prepared_statement->fetchAll(PDO::FETCH_ASSOC) as $arr_item) {
                    echo '
                        <div class="box-item">
                            <form method="POST">
                            <input type="hidden" name="usertrink" value="'. $arr_item['tid'] .'">
                            <button type="submit" name="tselect"><img src="images/temp_trink.png"></button>
                            </form>
                            <h3>' . $arr_item['name'] . " " . $arr_item['color'] . '</h3>
                            <h3> $' .  $arr_item['price'] . ' (' . $arr_item['size'] . ')' . '</h3>
                        </div>
                    ';
                }
                echo '</div>';
            }
        }catch(PDOException $e){
            echo "Could not verify if the user logged in or not !";
        }
    }
    // q4 -- continue, user selects a trinket
    if(isset($_POST["tselect"])){
        // get the flower 
        $user_trink = $_POST["usertrink"];
        $_SESSION['user_trink'] = $user_trink;
        if($_SESSION['user_trink']){
            header("Location: arr4.php");
        }
    }

    // q4 view all containers
    if(isset($_POST["allcons"])){
        try{
            // template query to bind the username and password into
            $arr_template_query = "SELECT * FROM containers";
            $arr_prepared_statement = $database_connect->prepare($arr_template_query);
            // execute the prepared statement and bind the eid and password
            $arr_prepared_statement->execute();
        
            if ($arr_prepared_statement->rowCount() > 0) {
                // Print out all the flowers in a specific order
                echo '<div class="flower-box">';
                foreach ($arr_prepared_statement->fetchAll(PDO::FETCH_ASSOC) as $arr_item) {
                    echo '
                        <div class="box-item">
                            <form method="POST">
                            <input type="hidden" name="usercont" value="'. $arr_item['con_id'] .'">
                            <button type="submit" name="cselect"><img src="images/temp_cont.png"></button>
                            </form>
                            <h3>' . $arr_item['name'] . " " . $arr_item['color'] . '</h3>
                            <h3> $' .  $arr_item['price'] . ' (' . $arr_item['size'] . ')' . '</h3>
                        </div>
                    ';
                }
                echo '</div>';
            }
        }catch(PDOException $e){
            echo "Could not verify if the user logged in or not !";
        }
    }
    // q4 price lowest to highest
    if(isset($_POST["cpricelo"])){
        try{
            // template query to bind the username and password into
            $arr_template_query = "SELECT * FROM containers ORDER BY price";
            $arr_prepared_statement = $database_connect->prepare($arr_template_query);
            // execute the prepared statement and bind the eid and password
            $arr_prepared_statement->execute();
        
            if ($arr_prepared_statement->rowCount() > 0) {
                // Print out all the flowers in a specific order
                echo '<div class="flower-box">';
                foreach ($arr_prepared_statement->fetchAll(PDO::FETCH_ASSOC) as $arr_item) {
                    echo '
                        <div class="box-item">
                            <form method="POST">
                            <input type="hidden" name="usercont" value="'. $arr_item['con_id'] .'">
                            <button type="submit" name="cselect"><img src="images/temp_cont.png"></button>
                            </form>
                            <h3>' . $arr_item['name'] . " " . $arr_item['color'] . '</h3>
                            <h3> $' .  $arr_item['price'] . ' (' . $arr_item['size'] . ')' . '</h3>
                        </div>
                    ';
                }
                echo '</div>';
            }
        }catch(PDOException $e){
            echo "Could not verify if the user logged in or not !";
        }
    }
    // q4 price highest to lowest
    if(isset($_POST["cpricehi"])){
        try{
            // template query to bind the username and password into
            $arr_template_query = "SELECT * FROM containers ORDER BY price DESC";
            $arr_prepared_statement = $database_connect->prepare($arr_template_query);
            // execute the prepared statement and bind the eid and password
            $arr_prepared_statement->execute();
        
            if ($arr_prepared_statement->rowCount() > 0) {
                // Print out all the flowers in a specific order
                echo '<div class="flower-box">';
                foreach ($arr_prepared_statement->fetchAll(PDO::FETCH_ASSOC) as $arr_item) {
                    echo '
                        <div class="box-item">
                            <form method="POST">
                            <input type="hidden" name="usercont" value="'. $arr_item['con_id'] .'">
                            <button type="submit" name="cselect"><img src="images/temp_cont.png"></button>
                            </form>
                            <h3>' . $arr_item['name'] . " " . $arr_item['color'] . '</h3>
                            <h3> $' .  $arr_item['price'] . ' (' . $arr_item['size'] . ')' . '</h3>
                        </div>
                    ';
                }
                echo '</div>';
            }
        }catch(PDOException $e){
            echo "Could not verify if the user logged in or not !";
        }
    }
    // q4 -- continue, user selects a container
    if(isset($_POST["cselect"])){
        // get the flower 
        $user_cont = $_POST["usercont"];
        $_SESSION['user_cont'] = $user_cont;
        if($_SESSION['user_cont']){
            header("Location: scripts/create_arrangement.php");
        }
    }


}