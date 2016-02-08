<?php
    require_once ('/var/www/html/app/model/connect.php');

    $sql = "SELECT * FROM EMM_ZOO.CAFE_SHOP ORDER BY SHOPID;";
    if ($conn) {
        $stmt = db2_exec($conn, $sql);
        if($stmt) {
            print "<tr>";
            print "<th>Shop No.</th>";
            print "<th>Shop Name</th>";
            print "<th>Type</th>";
            print "<th>Staff ID.</th>";
            print "<th>Edit</th>";
            print "<th>Delete</th>";
            print "</tr>";
        while ($row = db2_fetch_assoc($stmt)) {
            print "<tr><td>".$row['SHOPID']."</td><td>".$row['SHOPNAME']."</td><td>".$row['TYPE']."</td><td>".$row['STAFFID']."</td><td><a onclick=\"return editRest(".$row['SHOPID'].");\">Edit</a></td><td><a onclick=\"return delRest(".$row['SHOPID'].");\">Delete</a></td></tr>";
        }
    }
    db2_free_stmt($stmt);
    } 
    else {
    	echo db2_conn_errormsg($conn);
    }
?>
