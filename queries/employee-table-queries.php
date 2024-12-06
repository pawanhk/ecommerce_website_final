<link rel="stylesheet" href="../css/admin.css">
<?php

include 'connect_to_database.php';

// check for post 
if($_SERVER['REQUEST_METHOD'] == "POST"){
    // q1: All Employees
    if(isset($_POST['allemp'])){
        $sql = "SELECT * FROM employee";
        $result = mysqli_query($database_connect,$sql);
        if(mysqli_num_rows($result)>0){
            echo "<p> Successfully Found Table Results ... </p>";
            echo "<table>";
            echo "<tr>
                <th>EID</th>
                <th> First Name </th>
                <th> Last Name </th>
                <th> Position </th>
                <th> SSN </th>
                <th> Password </th>
                <th> Years Worked </th>
                <th> Date of Birth </th>
                </tr>";
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";

                $eid = $row['eid'];
                echo "<td>" . $eid . "</td>";
                $fname = $row['fname'];
                echo "<td>" .$fname . "</td>";
                $lname = $row['lname'];
                echo "<td>" . $lname . "</td>";
                $position = $row['position'];
                echo "<td>" . $position . "</td>";
                $ssn = $row['ssn'];
                echo "<td>" . $ssn . "</td>";
                $password = $row['password'];
                echo "<td>" . $password . "</td>";
                $years_worked = $row['years_worked'];
                echo "<td>" . $years_worked . "</td>";
                $DOB = $row['DOB'];
                echo "<td>" . $DOB . "</td>";

                echo "</tr>";
            }
            echo "</table>";

        }else{
            echo '  <p class="no-results"> No results or incorrect query ! </p>';
        }
    }
    //q2: Order by DOB oldest to youngest
    if(isset($_POST['odoboy'])){
        $sql = "SELECT * FROM employee ORDER BY DOB";
        $result = mysqli_query($database_connect,$sql);
        if(mysqli_num_rows($result)>0){
            echo "<p> Successfully Found Table Results ... </p>";
            echo "<table>";
            echo "<tr>
                <th>EID</th>
                <th> First Name </th>
                <th> Last Name </th>
                <th> Position </th>
                <th> SSN </th>
                <th> Password </th>
                <th> Years Worked </th>
                <th> Date of Birth </th>
                </tr>";
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";

                $eid = $row['eid'];
                echo "<td>" . $eid . "</td>";
                $fname = $row['fname'];
                echo "<td>" .$fname . "</td>";
                $lname = $row['lname'];
                echo "<td>" . $lname . "</td>";
                $position = $row['position'];
                echo "<td>" . $position . "</td>";
                $ssn = $row['ssn'];
                echo "<td>" . $ssn . "</td>";
                $password = $row['password'];
                echo "<td>" . $password . "</td>";
                $years_worked = $row['years_worked'];
                echo "<td>" . $years_worked . "</td>";
                $DOB = $row['DOB'];
                echo "<td>" . $DOB . "</td>";

                echo "</tr>";
            }
            echo "</table>";

        }else{
            echo '  <p class="no-results"> No results or incorrect query ! </p>';
        }
    }
    //q3: Order by DOB youngest to oldest
    if(isset($_POST['odobyo'])){
        $sql = "SELECT * FROM employee ORDER BY DOB DESC";
        $result = mysqli_query($database_connect,$sql);
        if(mysqli_num_rows($result)>0){
            echo "<p> Successfully Found Table Results ... </p>";
            echo "<table>";
            echo "<tr>
                <th>EID</th>
                <th> First Name </th>
                <th> Last Name </th>
                <th> Position </th>
                <th> SSN </th>
                <th> Password </th>
                <th> Years Worked </th>
                <th> Date of Birth </th>
                </tr>";
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";

                $eid = $row['eid'];
                echo "<td>" . $eid . "</td>";
                $fname = $row['fname'];
                echo "<td>" .$fname . "</td>";
                $lname = $row['lname'];
                echo "<td>" . $lname . "</td>";
                $position = $row['position'];
                echo "<td>" . $position . "</td>";
                $ssn = $row['ssn'];
                echo "<td>" . $ssn . "</td>";
                $password = $row['password'];
                echo "<td>" . $password . "</td>";
                $years_worked = $row['years_worked'];
                echo "<td>" . $years_worked . "</td>";
                $DOB = $row['DOB'];
                echo "<td>" . $DOB . "</td>";

                echo "</tr>";
            }
            echo "</table>";

        }else{
            echo '  <p class="no-results"> No results or incorrect query ! </p>';
        }
    }
    //q4 View only Execs
    if(isset($_POST['onlyexecs'])){
        $sql = "SELECT * FROM employee WHERE position in ('admin','CTO','CEO')";
        $result = mysqli_query($database_connect,$sql);
        if(mysqli_num_rows($result)>0){
            echo "<p> Successfully Found Table Results ... </p>";
            echo "<table>";
            echo "<tr>
                <th>EID</th>
                <th> First Name </th>
                <th> Last Name </th>
                <th> Position </th>
                <th> SSN </th>
                <th> Password </th>
                <th> Years Worked </th>
                <th> Date of Birth </th>
                </tr>";
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";

                $eid = $row['eid'];
                echo "<td>" . $eid . "</td>";
                $fname = $row['fname'];
                echo "<td>" .$fname . "</td>";
                $lname = $row['lname'];
                echo "<td>" . $lname . "</td>";
                $position = $row['position'];
                echo "<td>" . $position . "</td>";
                $ssn = $row['ssn'];
                echo "<td>" . $ssn . "</td>";
                $password = $row['password'];
                echo "<td>" . $password . "</td>";
                $years_worked = $row['years_worked'];
                echo "<td>" . $years_worked . "</td>";
                $DOB = $row['DOB'];
                echo "<td>" . $DOB . "</td>";

                echo "</tr>";
            }
            echo "</table>";

        }else{
            echo '  <p class="no-results"> No results or incorrect query ! </p>';
        }
    }
}

?>