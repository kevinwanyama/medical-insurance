<?php
/* Database credentials */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'K1');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$idno=$_POST["id"];
$result=mysqli_query($link,"select * from p1 where idno like '%$idno%'");
if(mysqli_num_rows($result) > 0){
    echo "<table class='table table-bordered table-striped'>";
        echo "<thead>";
            echo "<tr>";
                echo "<th>#</th>";
                echo "<th>name</th>";
                echo "<th>idno</th>";
                echo "<th>status</th>";
                echo "<th>Action</th>";
            echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['idno'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "<td>";
                    echo "<a href='readK.php?id=". $row['id'] ."' title='Records' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                    
                    
                echo "</td>";
            echo "</tr>";
        }
        echo "</tbody>";                            
    echo "</table>";
?>