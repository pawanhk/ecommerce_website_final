<link rel="stylesheet" href="../css/emp_profile.css">
<?php
include '../connect_to_database.php';
if(isset($_POST['view_all'])){
    try{
        // template query to select all employees
        $all_template_query = 
        "SELECT
        arrangements.aid AS arr_id,
        arrangements.cid AS cid,
        arrangements.eid AS eid,
        inventory.name AS inv_name,
        greens.name AS gname,
        trinkets.name AS tname,
        sweets.name AS sname,
        containers.name AS con_name		
        FROM    
        arrangements, 
        inventory, 
        greens, 
        trinkets, 
        sweets, 
        containers
        WHERE 
        arrangements.inv_id = inventory.inv_id AND 
        arrangements.gid = greens.gid AND 
        arrangements.tid = trinkets.tid AND 
        arrangements.sid = sweets.sid AND
        arrangements.con_id = containers.con_id;   
        ";
        // prepared select statement 
        $all_prepared_statement = $database_connect->prepare($all_template_query);
        // execute the prepared statement 
        $all_prepared_statement->execute();
        // return all the rows
        $all_query_rows = $all_prepared_statement->fetchAll(PDO::FETCH_ASSOC);
        if(count($all_query_rows)>0){
            echo "<p> Successfully Found Table Results ... </p>";
            echo "<table>";
            echo "<tr>
            <th>AID</th>
            <th>CID</th>
            <th>EID</th>
            <th>Flower Name</th>
            <th>Green Name</th>
            <th>Trinket Name</th>
            <th>Sweets Name</th>
            <th>Container Name</th>
            </tr>";
            foreach($all_query_rows as $row){
                $arr_id = $row['arr_id'];
                echo "<td>" . $arr_id . "</td>";
                $cid = $row['cid'];
                echo "<td>" . $cid . "</td>";
                $eid = $row['eid'];
                echo "<td>" . $eid . "</td>";
                $iname = $row['inv_name'];
                echo "<td>" . $iname . "</td>";
                $gname = $row['gname'];
                echo "<td>" . $gname . "</td>";
                $tname = $row['tname'];
                echo "<td>" . $tname . "</td>";
                $sname = $row['sname'];
                echo "<td>" . $sname . "</td>";
                $coname = $row['con_name'];
                echo "<td>" . $coname . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }else{
            echo "No data was found for this query !";
        }
    }catch(PDOException $e){
        echo "Query error in the admin page !";
    }
}
