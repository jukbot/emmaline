<?php
require_once ('/var/www/html/app/model/connect.php');
?>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Landing Page - Start Bootstrap Theme</title>

</head>
<body>
    <?php
        $showid = $_GET['showID'];
    
        $conn=dbConnect();
        
        if($conn) {
        
            if($_GET['showID'] != null){
                    $sql="SELECT *"
                    . " FROM EMM_ZOO.SHOW, EMM_ZOO.SHOW_ANIMAL, EMM_ZOO.SHOW_STAFF, EMM_ZOO.EMPLOYEE, EMM_ZOO.ANIMAL"
                    . " WHERE EMM_ZOO.SHOW.SHOWID = EMM_ZOO.SHOW_STAFF.SHOWID"
                    . " AND EMM_ZOO.SHOW_STAFF.EMPID = EMM_ZOO.EMPLOYEE.EMPID"
                    . " AND EMM_ZOO.SHOW_ANIMAL.ANIMALID = EMM_ZOO.ANIMAL.ANIMALID"
                    . " AND EMM_ZOO.SHOW.SHOWID = EMM_ZOO.SHOW_ANIMAL.SHOWID"
                    . " AND EMM_ZOO.SHOW.SHOWID = $showid;";
            
            $stmt=db2_prepare($conn, $sql);
            $result=db2_execute($stmt);
            
            echo "<table>";
            while($row = db2_fetch_assoc($stmt)) {
                    echo "<tr>";
                    echo "<td>Show ID</td><td>".$row['SHOWID']."</td></tr>";
                    echo "<tr><td>Show Name</td><td>".$row['SHOWNAME']."</td></tr>";
                    echo "<tr><td>Animal</td><td>".$row['ANIMALNAME']."</td></tr>";
                    echo "<tr><td>Building ID</td><td>".$row['BUILDINGID']."</td></tr>";
                    echo "<tr><td>Seat Amount</td><td>".$row['SEAT_AMOUNT']."</td></tr>";
                    echo "<tr><td>Price</td><td>".$row['PRICE']."</td></tr>";
                    echo "<tr><td>Employee</td><td>".$row['FIRSTNAME']." ".$row['LASTNAME']."</td>";
                    echo "</tr>";
            }
            echo "</table>";

            db2_free_stmt($stmt);
            db2_close($conn);
            } else {
                echo "<h1>Wrong SHOW ID</h1>";
            }
            
        } else {
            echo db2_conn_errormsg($conn);
        }
    ?>
	<a href="index.php"><button>Back</button></a>
</body>

    

	
    
    

    
    

    
    

	
    
    

    
    

    
    

    
    




</body></html>